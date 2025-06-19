<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Files\File;
use App\Models\ApiModel;
use DateTime;

class V1 extends ResourceController
{
  use ResponseTrait;
  protected $apiModel;

  public function submit($email = null){
    $this->apiModel = new ApiModel();

    if (!$this->request->is('post') || !$email) {
      return $this->failValidationError("Invalid request.");
    }

    helper(['form', 'url', 'filesystem']);

    $post = $this->request->getPost();
    $files = $this->request->getFiles();

    // Extract form fields (excluding submitter_ fields)
    $fields = [];
    foreach ($post as $key => $value) {
      if (!str_starts_with($key, 'submitter_')) {
        $fields[htmlspecialchars($key)] = htmlspecialchars($value);
      }
    }

    // Handle submitter special fields
    $replyTo     = $post['submitter_replyto']    ?? null;
    $subject     = $post['submitter_subject']    ?? 'New Form Submission from SUBMITTER';
    $ccRaw       = $post['submitter_cc']         ?? null;
    $autoReply   = $post['submitter_autorespond'] ?? null;
    $template    = $post['submitter_template']   ?? 'basic';
    $webhookUrl  = $post['submitter_webhook']    ?? null;

    // File upload handling
    $uploadedFiles = [];
    if (!empty($files)) {
      foreach ($files as $fileKey => $file) {
        if ($file->isValid() && $file->getSize() <= 2 * 1024 * 1024) {
          $newName = $file->getRandomName();
          $file->move(WRITEPATH . 'uploads', $newName);
          $uploadedFiles[$fileKey] = base_url('writable/uploads/' . $newName);
        }
      }
    }

    // backend verification check
    $userDetails = $this->apiModel->SelectField('users', "`email`='$email' OR `email_id`='$email'", '*')->getRow();
    if($userDetails){
      $email = $userDetails->email;
      $isVerified = $userDetails->is_verified;
    }else{
      $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
      if (!$isEmail) {
        return $this->respond(['status' => false, 'message' => 'Invalid email address.']);
      }else{
        $saveData = [
          'email'       => $email,
          'email_id'    => md5($email),
          'is_verified' => 0,
          'created_at'  => date('Y-m-d H:i:s'),
          'updated_at'  => date('Y-m-d H:i:s')
        ];
        $this->apiModel->SaveData('users', $saveData);

        $this->sendVerificationEmail($email, md5($email));
        $isVerified = 0;
      }
    }
    $payloadData = [
      'email'       => $email,
      'data_json'   => json_encode($post),
      'files_json'  => json_encode($uploadedFiles),
      'ip_address'  => $this->request->getIPAddress(),
      'user_agent'  => $this->request->getUserAgent()->getBrowser(),
      'is_sent'     => 0,
      'created_at'  => date('Y-m-d H:i:s'),
    ];
    $this->apiModel->SaveData('api_payload', $payloadData);
    $last_id = $this->db->insertId();

    if($isVerified == 1){
        // Prepare email
      $emailService = \Config\Services::email();
      $emailService->setFrom('info@aniketgolhar.in', 'SUBMITTER');
      $emailService->setTo($email);

      if ($replyTo && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
        $emailService->setReplyTo($replyTo);
      }

      if ($ccRaw) {
        $ccList = explode(',', $ccRaw);
        $validCC = array_filter(array_map('trim', $ccList), fn($cc) => filter_var($cc, FILTER_VALIDATE_EMAIL));
        if (!empty($validCC)) {
          $emailService->setCC($validCC);
        }
      }

      $emailService->setSubject($subject);
      $emailService->setMessage($this->renderTemplate($template, $fields, $uploadedFiles));
      $emailService->setMailType('html');
      if($emailService->send()){
        $this->apiModel->SaveData('api_payload', ['is_sent' => 1], ['id' => $last_id]);
      }

      // Auto responder
      if ($autoReply && isset($fields['email']) && filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) {
        $autoResponder = \Config\Services::email();
        $autoResponder->setFrom('info@aniketgolhar.in', 'SUBMITTER');
        $autoResponder->setTo($fields['email']);
        $autoResponder->setSubject("Thank you for contacting us");
        $autoResponder->setMessage($autoReply);
        $autoResponder->setMailType('html');
        $autoResponder->send();
      }

      // Webhook request
      if ($webhookUrl) {
        $this->sendWebhook($webhookUrl, array_merge($fields, ['files' => $uploadedFiles]));
      }

      return $this->respond(['status' => true, 'message' => 'Form submitted successfully']);
    }else{
      return $this->respond(['status' => false, 'message' => 'Please verify your email address.']);
    }
    
  }

  private function renderTemplate($type, $data, $files = []){
    $brandingTop = "
      <div style='text-align:center; padding-bottom: 20px;'>
        <h6>
          <span style='font-size: 18px; font-weight: bold; color: black;'>SUBM</span>
          <span style='font-size: 18px; font-weight: bold; color: red;'>I</span>
          <span style='font-size: 18px; font-weight: bold; color: purple;'>TTER</span>
        </h6>
        <p style='margin:5px;font-size:14px;color:#666;'>Fast, secure, and reliable form backend by <strong>SUBMITTER</strong></p>
      </div>
    ";

    $footer = "
      <div style='margin-top:30px; font-size:13px; color:#777; border-top:1px solid #ddd; padding-top:10px;'>
        <p>Thank you for using <a href='".base_url()."'>SUBMITTER</a>.<br>Regards,<br><strong>Team <span style='font-size: 18px; font-weight: bold; color: black;'>SUBM</span><span style='font-size: 18px; font-weight: bold; color: red;'>I</span><span style='font-size: 18px; font-weight: bold; color: purple;'>TTER</span></strong></p>
      </div>
    ";

    $html = "<div style='font-family:Segoe UI, sans-serif;padding:20px;background:#ffffff;border-radius:10px;border:1px solid #e0e0e0;'>";
    $html .= $brandingTop;

    switch ($type) {
      case 'modern':
        $html .= '<div style="max-width: 500px; margin: auto; font-family: \'Segoe UI\', sans-serif; background: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
          <h2 style="margin-top: 0;">New Form Submission</h2>';
          foreach ($data as $key => $value) {
            $html .= '<div style="margin-bottom: 10px;"><strong>'.ucfirst($key).':</strong> '.nl2br(htmlspecialchars($value)).'</div>';
          }
        $html .= '</div>';
        
        break;

      case 'classic':
        $html .= '<div style="font-family: Georgia, serif; font-size: 16px;">
          <p><strong>Form Submission Details:</strong></p>
          <ul style="list-style-type: disc; padding-left: 20px;">';
            foreach ($data as $key => $value) {
              $html .= '<li><strong>'.ucfirst($key).':</strong> '.nl2br(htmlspecialchars($value)).'</li>';
            }
        $html .= '</ul>
                </div>';
        break;

      case 'boxed':
        $html .= '<div style="display: grid; grid-template-columns: 1fr 2fr; gap: 10px; font-family: Arial, sans-serif; max-width: 500px; background: #f4f4f4; padding: 20px; border-radius: 8px;">';
        foreach ($data as $key => $value) {
          $html .= '<div style="font-weight: bold;">'.ucfirst($key).':</div>
          <div>'.nl2br(htmlspecialchars($value)).'</div>';
        }
        $html .= "</div>";
        break;

      case 'badge':
        $html .= '<div style="font-family: sans-serif; background-color: #fff; padding: 20px; border-left: 5px solid #4CAF50;">';
        $colors = ['#4CAF50', '#F44336', '#FFEB3B', '#2196F3', '#9C27B0', '#3F51B5', '#FF9800', '#00BCD4'];
        foreach ($data as $key => $value) {
            $color = $colors[array_rand($colors)];
            $html .= '<p><span style="background: '.$color.'; color:white; padding:4px 10px; border-radius:6px; font-weight: bold;">'.ucfirst($key).'</span> '.nl2br(htmlspecialchars($value)).'</p>';
        }
        $html .= '</div>';
        break;

      case 'minimal':
        $html .= '<div style="font-family: \'Helvetica Neue\', sans-serif; font-size: 16px; color: #333;">';
        foreach ($data as $key => $value) {
          $html .= '<p><strong>'.ucfirst($key).'</strong><br>'.nl2br(htmlspecialchars($value)).'</p>
          <hr style="border:none;border-top:1px solid #ccc;">';
        }
        $html .= '</div>';
        break;

      case 'basic':
      default:
        $html .= "<table style='width:100%; border-collapse:collapse'>";
        $i = 0;
        foreach ($data as $key => $value) {
          $bg = $i++ % 2 === 0 ? '#f9f9f9' : '#ffffff';
          $html .= "<tr style='background:{$bg}'><td style='padding:8px'><strong>" . ucfirst($key) . "</strong></td><td style='padding:8px'>" . nl2br(htmlspecialchars($value)) . "</td></tr>";
        }
        $html .= "</table>";
        break;
    }

    // Show uploaded files if any
    if (!empty($files)) {
        $html .= "<div style='margin-top:20px'><strong>Uploaded Files:</strong><ul>";
        foreach ($files as $link) {
            $html .= "<li><a href='{$link}'>{$link}</a></li>";
        }
        $html .= "</ul></div>";
    }

    $html .= $footer . "</div>";

    return $html;
  }


  private function sendWebhook($url, $payload){
    $client = \Config\Services::curlrequest();
    try {
      $client->post($url, [
          'headers' => ['Content-Type' => 'application/json'],
          'body'    => json_encode($payload)
      ]);
    } catch (\Exception $e) {
      log_message('error', 'Webhook error: ' . $e->getMessage());
    }
  }

  private function sendVerificationEmail($email, $hash){
    $link = base_url("verify/{$hash}");

    $brandingTop = "
      <div style='text-align:center; padding-bottom: 20px;'>
        <h2>
          <span style='color:black;'>SUBM</span>
          <span style='color:red;'>I</span>
          <span style='color:purple;'>TTER</span>
        </h2>
        <p style='font-size:14px; color:#666;'>Fast, secure, and reliable form backend by <strong>SUBMITTER</strong></p>
      </div>
    ";

    $footer = "
      <div style='margin-top:30px; font-size:13px; color:#777; border-top:1px solid #ddd; padding-top:10px;'>
        <p>Thank you for choosing <strong>SUBMITTER</strong>.<br>
        Regards,<br>
        <strong>Team <span style='color:black;'>SUBM</span><span style='color:red;'>I</span><span style='color:purple;'>TTER</span></strong><br>
        <a href='".base_url()."docs' target='_blank'>View Documentation</a>
        </p>
      </div>
    ";

    $body = "
      <div style='font-family:Segoe UI, sans-serif;padding:20px;background:#ffffff;border-radius:10px;border:1px solid #e0e0e0;'>
        {$brandingTop}
        <h3 style='color:#333;'>Verify Your Email Address</h3>
        <p style='font-size:15px;'>Thank you for using <strong>SUBMITTER</strong>. To start receiving form submissions securely at <strong>{$email}</strong>, please verify your email address.</p>
        <p><a href='{$link}' style='display:inline-block;padding:10px 15px;background:#4CAF50;color:#fff;text-decoration:none;border-radius:5px;'>Verify Email Now</a></p>
        <p>If the button above doesn't work, copy and paste the following URL into your browser:</p>
        <p><a href='{$link}'>{$link}</a></p>
        <hr>
        <p style='font-size:14px;color:#555;'>For secure API access, you may use your unique MD5 code in your endpoint as:</p>
        <pre style='background:#f7f7f7;padding:10px;border:1px dashed #ccc;'>".base_url()."v1/{$hash}</pre>
        <p style='font-size:13px;color:#666;'>This ensures form submissions are only accepted from verified users.</p>
        {$footer}
      </div>
    ";

    $emailService = \Config\Services::email();
    $emailService->setFrom('info@aniketgolhar.in', 'SUBMITTER');
    $emailService->setTo($email);
    $emailService->setSubject('Verify Your Email - SUBMITTER');
    $emailService->setMessage($body);
    $emailService->setMailType('html');
    $emailService->send();
  }

  // ====================================================================
  // ====================================================================

  public function verifyEmail($hash) {
    $this->apiModel = new ApiModel();
    
    $userDetails = $this->apiModel->SelectField('users', ['email_id' => $hash], '*')->getRow();
    if($userDetails){
      $this->apiModel->SaveData('users', ['is_verified' => 1, 'verified_at' => date('Y-m-d H:i:s')], ['email_id' => $hash]);

      $unsentEmails = $this->apiModel->GetData('api_payload', '', ['email' => $userDetails->email, 'is_sent' => 0], '', '', '', '');
      if($unsentEmails){
        foreach($unsentEmails as $list){
          $postData = json_decode($list->data_json, true);
          $fileData = json_decode($list->files_json, true);

          $fields = [];
          foreach ($postData as $key => $value) {
            if (!str_starts_with($key, 'submitter_')) {
              $fields[htmlspecialchars($key)] = htmlspecialchars($value);
            }
          }

          // Handle submitter special fields
          $replyTo     = $postData['submitter_replyto']    ?? null;
          $subject     = $postData['submitter_subject']    ?? 'New Form Submission from SUBMITTER';
          $ccRaw       = $postData['submitter_cc']         ?? null;
          $autoReply   = $postData['submitter_autorespond'] ?? null;
          $template    = $postData['submitter_template']   ?? 'basic';
          $webhookUrl  = $postData['submitter_webhook']    ?? null;

          $emailService = \Config\Services::email();
          $emailService->setFrom('info@aniketgolhar.in', 'SUBMITTER');
          $emailService->setTo($userDetails->email);

          if ($replyTo && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
            $emailService->setReplyTo($replyTo);
          }

          if ($ccRaw) {
            $ccList = explode(',', $ccRaw);
            $validCC = array_filter(array_map('trim', $ccList), fn($cc) => filter_var($cc, FILTER_VALIDATE_EMAIL));
            if (!empty($validCC)) {
              $emailService->setCC($validCC);
            }
          }

          $emailService->setSubject($subject);
          $emailService->setMessage($this->renderTemplate($template, $fields, $fileData));
          $emailService->setMailType('html');
          if($emailService->send()){
            $this->apiModel->SaveData('api_payload', ['is_sent' => 1], ['id' => $list->id]);
          }

          // Auto responder
          if ($autoReply && isset($fields['email']) && filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) {
            $autoResponder = \Config\Services::email();
            $autoResponder->setFrom('info@aniketgolhar.in', 'SUBMITTER');
            $autoResponder->setTo($fields['email']);
            $autoResponder->setSubject("Thank you for contacting us");
            $autoResponder->setMessage($autoReply);
            $autoResponder->setMailType('html');
            $autoResponder->send();
          }

          // Webhook request
          if ($webhookUrl) {
            $this->sendWebhook($webhookUrl, array_merge($fields, ['files' => $fileData]));
          }
        }
      }

      // return $this->respond(['status' => true, 'message' => 'Email verified successfully']);
      return redirect()->to(base_url('?verified=true'));
    }else{
      // return $this->respond(['status' => false, 'message' => 'User not found']);
      return redirect()->to(base_url('?verified=false'));
    }
  }

}