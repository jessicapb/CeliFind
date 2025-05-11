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
        date_default_timezone_set('Europe/Madrid'); // Ajusta la zona horaria a tu región
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
        // Cambiar cuando se suba a prod
        if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] === 'localhost') {
            $resetLink = "http://localhost:8000/resetpassword?token=$token";
        } else {
            $resetLink = "http://localhost:8000/resetpassword?token=$token";
        }
        //$resetLink = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . "/resetpassword?token=$token";
        $body = "<p>Fes clic a l'enllaç per restablir la teva contrasenya:</p> <a href='$resetLink'>$resetLink</a>";
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
