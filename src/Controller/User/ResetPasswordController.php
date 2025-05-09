<?php

namespace App\Controller\User;

use App\Infrastructure\Persistence\UserRepository;

class ResetPasswordController
{
    private \PDO $db;
    private UserRepository $userRepository;

    public function __construct(\PDO $db, UserRepository $userRepository)
    {
        $this->db = $db;
        $this->userRepository = $userRepository;
    }

    public function showResetPassword()
    {
        $token = $_GET['token'] ?? '';
        session_start();
        if (!$token || !$this->userRepository->findByResetToken($token)) {
            $_SESSION['errors']['token'] = 'Token invàlid o caducat.';
            header('Location: /forgotpassword');
            exit;
        }
        require VIEWS . '/login/resetpassword.view.php';
    }

    public function updatePassword()
    {
        $token = $_POST['token'] ?? '';
        $password = trim($_POST['password'] ?? '');
        $confirm = trim($_POST['confirm_password'] ?? '');
        session_start();
        if (!$token || !$this->userRepository->findByResetToken($token)) {
            $_SESSION['errors']['token'] = 'Token invàlid o caducat.';
            header('Location: /forgotpassword');
            exit;
        }
        if ($password === '' || $confirm === '') {
            $_SESSION['errors']['password'] = "Has d'omplir els dos camps de contrasenya.";
            header('Location: /resetpassword?token=' . urlencode($token));
            exit;
        }
        if ($password !== $confirm) {
            $_SESSION['errors']['confirm_password'] = 'Les contrasenyes no coincideixen.';
            header('Location: /resetpassword?token=' . urlencode($token));
            exit;
        }
        if (strlen($password) < 6) {
            $_SESSION['errors']['password'] = 'La contrasenya ha de tenir almenys 6 caràcters.';
            header('Location: /resetpassword?token=' . urlencode($token));
            exit;
        }
        $user = $this->userRepository->findByResetToken($token);
        $this->userRepository->updatePassword($user->getId(), password_hash($password, PASSWORD_BCRYPT));
        $_SESSION['success'] = 'Contrasenya restablerta correctament. Ja pots iniciar sessió.';
        header('Location: /login');
        exit;
    }
}
