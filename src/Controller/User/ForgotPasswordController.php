<?php

namespace App\Controller\User;

use App\Infrastructure\Persistence\UserRepository;
use App\Celifind\Services\EmailService;
use App\Celifind\Checks\ChecksUser;

class ForgotPasswordController
{
    private \PDO $db;
    private UserRepository $userRepository;
    private EmailService $emailService;

    public function __construct(\PDO $db, UserRepository $userRepository, EmailService $emailService)
    {
        date_default_timezone_set('Europe/Madrid');
        $this->db = $db;
        $this->userRepository = $userRepository;
        $this->emailService = $emailService;
    }

    public function showForgotPassword()
    {
        require VIEWS . '/login/forgotpassword.view.php';
    }

    public function sendResetLink()
    {
        session_start();
        $email = trim($_POST['email'] ?? '');
        if (!$this->userRepository->existsByEmail($email)) {
            $_SESSION['errors']['email'] = 'Aquest correu no existeix.';
            header('Location: /forgotpassword');
            exit;
        }
        $token = bin2hex(random_bytes(32));
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $this->userRepository->setResetToken($email, $token, $expiry);
        
            if($_SERVER['SERVER_NAME'] == "localhost"){
                $resetLink = "http://localhost:8000/resetpassword?token=$token";
            }else{
                $resetLink = "https://nervous-visvesvaraya.195-20-230-201.plesk.page/resetpassword?token=$token";
            }
        //$resetLink =  . "/resetpassword?token=$token";
        $body = '<div style="font-family: Arial, sans-serif; background-color: #f9fafb; text-wrap: pretty; padding: 32px; max-width: 480px; margin: 0 auto; border-radius: 18px; border: 2px solid #fcb666;">
            <div style="text-align: center; margin-bottom: 24px;">
                <img src="cambiar aquí el de arriba/img/logo/logo.png" alt="Celifind Logo" style="width: 90px; margin-bottom: 12px;">
                <h2 style="color: #fcb666; font-family: Arial, sans-serif; font-size: 2rem; margin: 0;">Recuperació de contrasenya</h2>
            </div>
            <p style="color: #22223b; font-size: 17px;">Hola,</p>
            <p style="color: #22223b; font-size: 16px;">Hem rebut una sol·licitud per restablir la contrasenya del teu compte de <span style="color: #fcb666; font-weight: bold;">Celifind</span>. Si no has estat tu, pots ignorar aquest correu.</p>
            <p style="color: #22223b; font-size: 16px;">Per restablir la teva contrasenya, fes clic al botó següent:</p>
            <div style="text-align: center; margin: 28px 0;">
                <a href='.$resetLink.' style="display: inline-block; background-color: #fcb666; color: #fff; padding: 14px 36px; border-radius: 12px; text-decoration: none; font-size: 18px; font-weight: bold; letter-spacing: 1px; box-shadow: 0 2px 8px #fcb66644; min-width: 180px; max-width: 100%; text-align: center; word-break: break-word;">Restableix la contrasenya</a>
            </div>
            <p style="color: #666; font-size: 14px;">Aquest enllaç caducarà en 1 hora per motius de seguretat.</p>
            <p style="color: #999; font-size: 13px; margin-top: 32px;">Si tens qualsevol dubte, contacta amb nosaltres a <a href="mailto:celifind.cat@gmail.com" style="color: #fcb666; text-decoration: underline;">celifind.cat@gmail.com</a>.</p>
            <p style="color: #bbb; font-size: 12px; text-align: center; margin-top: 24px;">&copy; 2025 Celifind</p>
        </div>';
        $sent = $this->emailService->send($email, 'Recupera la teva contrasenya', $body);
        if ($sent) {
            $_SESSION['success'] = "T'hem enviat un correu per restablir la contrasenya.";
        } else {
            $_SESSION['errors']['email'] = "No s'ha pogut enviar el correu. Torna-ho a intentar.";
        }
        header('Location: /forgotpassword');
        exit;
    }
}
