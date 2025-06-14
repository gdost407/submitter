<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Email\Email;

class V2 extends BaseController
{
    protected $email;

    public function __construct()
    {
        $this->email = \Config\Services::email();
    }

    public function index(): ResponseInterface
    {
        return $this->response->setJSON([
            'status' => true,
            'message' => 'V2 API is working fine!',
        ]);
    }

    public function sendTestEmail($email): ResponseInterface
    {
        $subject = 'Test Email from SUBMITTER V2';
        $message = '<h2>Hello from V2 Controller!</h2><p>This is a test email using your Hostinger SMTP setup.</p>';

        $this->email->setFrom('info@aniketgolhar.in', 'SUBMITTER');
        $this->email->setTo($email);
        $this->email->setSubject($subject);
        $this->email->setMessage($message);

        if ($this->email->send()) {
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Email sent successfully!',
            ]);
        } else {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Failed to send email.',
                'debug' => $this->email->printDebugger(['headers']),
            ]);
        }
    }
}
