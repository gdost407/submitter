<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;
use Config\Services;

class WebModel extends Model
{
    // Table name (will be dynamically set)
    protected $table;

    // Primary key (default is 'id')
    protected $primaryKey = 'id';

    // Allowed fields for insert/update
    protected $allowedFields = [];

    /**
     * Set the table name dynamically.
     *
     * @param string $table The table name.
     * @return $this
     */
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * Get single or multiple records.
     *
     * @param string $table The table name.
     * @param string $field The fields to select.
     * @param array $condition The WHERE clause.
     * @param string $group The GROUP BY clause.
     * @param string $order The ORDER BY clause.
     * @param int $limit The LIMIT clause.
     * @param bool $singleRow Whether to return a single row or multiple rows.
     * @return array|object|null The result set.
     */
    public function GetData($table, $field = '*', $condition = [], $group = '', $order = '', $limit = '', $singleRow = false)
    {
        $builder = $this->db->table($table);
        $builder->select($field);

        if (!empty($condition)) {
            $builder->where($condition);
        }

        if (!empty($group)) {
            $builder->groupBy($group);
        }

        if (!empty($order)) {
            $builder->orderBy($order);
        }

        if (!empty($limit)) {
            $builder->limit($limit);
        }

        if ($singleRow) {
            return $builder->get()->getRow();
        } else {
            return $builder->get()->getResult();
        }
    }

    /**
     * Get multiple records with pagination.
     *
     * @param string $table The table name.
     * @param string $field The fields to select.
     * @param array $condition The WHERE clause.
     * @param string $group The GROUP BY clause.
     * @param string $order The ORDER BY clause.
     * @param int $limit The LIMIT clause.
     * @param int $page The page number for pagination.
     * @return array The result set.
     */
    public function GetDataAll($table, $field = '*', $condition = [], $group = '', $order = '', $limit = '', $page = '')
    {
        $builder = $this->db->table($table);
        $builder->select($field);

        if (!empty($condition)) {
            $builder->where($condition);
        }

        if (!empty($group)) {
            $builder->groupBy($group);
        }

        if (!empty($order)) {
            $builder->orderBy($order);
        }

        if (!empty($limit) && !empty($page)) {
            $offset = ($page - 1) * $limit;
            $builder->limit($limit, $offset);
        } elseif (!empty($limit)) {
            $builder->limit($limit);
        }

        return $builder->get()->getResult();
    }

    /**
     * Get page count for pagination.
     *
     * @param string $table The table name.
     * @param array $condition The WHERE clause.
     * @param int $limit The number of records per page.
     * @return int The total number of pages.
     */
    public function PageCount($table, $condition = [], $limit = '')
    {
        $builder = $this->db->table($table);

        if (!empty($condition)) {
            $builder->where($condition);
        }

        $totalRows = $builder->countAllResults();
        return ceil($totalRows / $limit);
    }

    /**
     * Save or update data.
     *
     * @param string $table The table name.
     * @param array $data The data to save or update.
     * @param array $condition The WHERE clause for updates.
     * @return bool|int The insert ID or true/false for updates.
     */
    public function SaveData($table, $data, $condition = [])
    {
        $builder = $this->db->table($table);

        if (!empty($condition)) {
            return $builder->where($condition)->set($data)->update();
        } else {
            return $builder->insert($data);
        }
    }

    /**
     * Delete data.
     *
     * @param string $table The table name.
     * @param array $condition The WHERE clause.
     * @param int $limit The LIMIT clause.
     * @return bool True on success, false on failure.
     */
    public function DeleteData($table, $condition = [], $limit = '')
    {
        $builder = $this->db->table($table);

        if (!empty($condition)) {
            $builder->where($condition);
        }

        if (!empty($limit)) {
            $builder->limit($limit);
        }

        return $builder->delete();
    }

    /**
     * Check if a record exists.
     *
     * @param string $table The table name.
     * @param array $where The WHERE clause.
     * @return int 1 if exists, 0 otherwise.
     */
    public function checkExists($table, $where)
    {
        $builder = $this->db->table($table);

        $builder->select('*')->where($where);

        return ($builder->get()->getRow()) ? 1 : 0;
    }

    /**
     * Select specific fields from a table.
     *
     * @param string $table The table name.
     * @param array $where The WHERE clause.
     * @param string $field The fields to select.
     * @return array|object|null The result set.
     */
    public function SelectField($table, $where, $field = '*')
    {
        $builder = $this->db->table($table);
        
        $builder->select($field)->where($where);

        return $builder->get();
    }

    /**
     * Send SMTP email.
     *
     * @param int $fsm_id The service partner ID.
     * @param string $subject The email subject.
     * @param string $message The email message.
     * @param string $to_email The recipient email.
     * @param string $cc The CC email.
     * @param string $bcc The BCC email.
     * @param string $attachment The attachment path.
     * @return bool True on success, false on failure.
     */
    public function FsmSmtpEmail($fsm_id, $subject, $message, $to_email, $cc = '', $bcc = '', $attachment = '')
    {
        $db = db_connect();
        $encryptionModel = new EncryptionModel();

        // Fetch user data
        $emailuser = $db->table('tbl_service_partner')
            ->select('tsp_profile_image, tsp_business_name, tsp_email, tsp_contact_number')
            ->where('id', $fsm_id)
            ->get()
            ->getRow();

        $bgpath = ($emailuser->tsp_profile_image == 'assets/Web-Fsm/images/dashboard/Support02.png') ? '' : base_url($emailuser->tsp_profile_image);
        $userbusinessname = $emailuser->tsp_business_name ?: 'Lockene Inc';
        $useremail = $emailuser->tsp_email ?: '---';
        $teldecrypt = $encryptionModel->decrypt($emailuser->tsp_contact_number);
        $usercontactnumber = $teldecrypt ?: '---';

        // Prepare email body
        $message_body = '<!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                </head>
                <body style="font-family: Arial, sans-serif; background-color: #f1f1f1; margin: 0; padding: 0;">
                    <div class="container" style="width: 90%; margin: 0 auto; background-color: #ffffff; padding: 10px;">
                        <div class="header">
                            <img src="' . $bgpath . '" alt="Header Image" style="width: 80px; height: 80px; object-fit: cover;">
                        </div>
                        <div class="content" style="margin: 20px 0;">
                            ' . $message . '
                            <p>Regards,<br>' . $userbusinessname . ',<br>' . $useremail . ', ' . $usercontactnumber . '</p>
                        </div>
                    </div>
                    <div class="footer" style="background-color: #f1f1f1; padding: 20px 30px; text-align: center;">
                        <p style="margin: 0; font-size: 12px;">&copy; "' . date("Y") . '" All rights reserved by <a href="https://lockene.us/" style="color: #000; text-decoration: none;">lockene.us</a></p>
                    </div>
                </body>
            </html>';

        // Fetch SMTP settings
        $smtpconfig = $db->table('smtp_configure')
            ->where(['user_id' => $fsm_id, 'user_type' => 'FSM'])
            ->get()
            ->getRow();

        $email = Services::email();

        if (!empty($smtpconfig)) {
            $smtp = ($smtpconfig->smtp_host == 'smtp.gmail.com') ? 'esmtp' : 'smtp';
            $config = [
                'protocol'    => $smtp,
                'SMTPHost'    => $smtpconfig->smtp_host,
                'SMTPPort'    => (int)$smtpconfig->smtp_port,
                'SMTPUser'    => $smtpconfig->smtp_email,
                'SMTPPass'    => $smtpconfig->smtp_password,
                'SMTPCrypto'  => $smtpconfig->smtp_encryption,
                'mailType'    => 'html',
                'charset'     => 'utf-8',
                'wordWrap'    => true,
                'newline'     => "\r\n"
            ];

            $email->initialize($config);
            $email->setFrom($smtpconfig->smtp_email, $userbusinessname);
        } else {
            $email->setFrom('notify@lockene.us', $userbusinessname);
        }

        // Send Email
        $email->setTo($to_email);
        $email->setSubject($subject);
        $email->setMessage($message_body);

        if (!empty($cc)) {
            $email->setCC($cc);
        }
        if (!empty($bcc)) {
            $email->setBCC($bcc);
        }

        if (!empty($attachment)) {
            $attachments = explode(',', $attachment);
            foreach ($attachments as $file) {
                if($file != '' && $file[0] == 'u'){
                    $email->attach(base_url($file));
                }else{
                    $email->attach($file);
                }
            }
        }

        if ($email->send()) {
            return true;
        } else {
            return $email->printDebugger(['headers']);
        }
    }

}