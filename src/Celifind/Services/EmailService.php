<?php
namespace App\Celifind\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailService {
    private $mailer;

    public function __construct() {
        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = ''; 
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = 'celifind.cat@gmail.com'; 
        $this->mailer->Password = "Gq7CeliFind=a95'CJDA.%x0Yg}"; 
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port = 587;
        $this->mailer->setFrom('celifind.cat@gmail.com', 'CeliFind');
    }

    public function send($to, $subject, $body) {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($to);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;
            $this->mailer->send();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
