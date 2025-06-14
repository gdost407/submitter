<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Files\File;

class V1 extends ResourceController
{
  use ResponseTrait;

  public function submit($email = null)
  {
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
    $emailService->send();

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
  }

  private function renderTemplate($type, $data, $files = [])
  {
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
        <p>Thank you for using SUBMITTER.<br>Regards,<br><strong>Team <span style='font-size: 18px; font-weight: bold; color: black;'>SUBM</span><span style='font-size: 18px; font-weight: bold; color: red;'>I</span><span style='font-size: 18px; font-weight: bold; color: purple;'>TTER</span></strong></p>
      </div>
    ";

    $html = "<div style='font-family:Segoe UI, sans-serif;padding:20px;background:#ffffff;border-radius:10px;border:1px solid #e0e0e0;'>";
    $html .= $brandingTop;

    switch ($type) {
      case 'modern':
        $html .= "<h2 style='margin-top:0'>New Form Submission</h2>";
        foreach ($data as $key => $value) {
          $html .= "<p><strong>" . ucfirst($key) . ":</strong> " . nl2br(htmlspecialchars($value)) . "</p>";
        }
        break;

      case 'classic':
        $html .= "<ul style='padding-left:20px'>";
        foreach ($data as $key => $value) {
          $html .= "<li><strong>" . ucfirst($key) . ":</strong> " . htmlspecialchars($value) . "</li>";
        }
        $html .= "</ul>";
        break;

      case 'boxed':
        $html .= "<div style='display:flex; flex-wrap:wrap; gap:10px;'>";
        foreach ($data as $key => $value) {
          $html .= "<div style='flex:1 0 45%; border:1px solid #ccc; padding:10px; border-radius:5px;'>
                      <strong>" . ucfirst($key) . ":</strong><br>" . nl2br(htmlspecialchars($value)) . "
                    </div>";
        }
        $html .= "</div>";
        break;

      case 'striped':
        $html .= "<table style='width:100%; border-collapse:collapse'>";
        $i = 0;
        foreach ($data as $key => $value) {
          $bg = $i++ % 2 === 0 ? '#f9f9f9' : '#ffffff';
          $html .= "<tr style='background:{$bg}'><td style='padding:8px'><strong>" . ucfirst($key) . "</strong></td><td style='padding:8px'>" . nl2br(htmlspecialchars($value)) . "</td></tr>";
        }
        $html .= "</table>";
        break;

      case 'minimal':
        foreach ($data as $key => $value) {
          $html .= "<div style='margin-bottom:10px'><strong>" . ucfirst($key) . ":</strong> " . nl2br(htmlspecialchars($value)) . "</div>";
        }
        break;

      case 'basic':
      default:
        $html .= "<table border='1' cellpadding='8' cellspacing='0' style='width:100%; border-collapse:collapse'>";
        foreach ($data as $key => $value) {
          $html .= "<tr><td><strong>" . ucfirst($key) . "</strong></td><td>" . nl2br(htmlspecialchars($value)) . "</td></tr>";
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


  private function sendWebhook($url, $payload)
  {
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
}