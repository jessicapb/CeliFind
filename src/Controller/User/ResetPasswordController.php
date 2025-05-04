<?php
namespace App\Controller\User;

use App\Infrastructure\Persistence\UserRepository;

class ResetPasswordController {
    private \PDO $db;
    private UserRepository $userRepository;

    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->userRepository = new UserRepository($db);
    }

    public function showResetPassword() {
        $token = $_GET['token'] ?? '';
        require VIEWS . '/login/resetpassword.view.php';
    }

    public function updatePassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION['errors'] = [];
            $token = $_POST['token'] ?? '';
            $password = $_POST['password'] ?? '';
            $user = $this->userRepository->findByResetToken($token);
            if (!$user) {
                $_SESSION['errors']['token'] = 'Token invàlid o caducat.';
                header('Location: /resetpassword?token=' . urlencode($token));
                exit;
            }
            if (strlen($password) < 6) {
                $_SESSION['errors']['password'] = 'La contrasenya ha de tenir almenys 6 caràcters.';
                header('Location: /resetpassword?token=' . urlencode($token));
                exit;
            }
            $this->userRepository->updatePassword($user->getId(), $password);
            $_SESSION['success'] = 'Contrasenya actualitzada correctament. Ja pots iniciar sessió.';
            header('Location: /login');
            exit;
        }
    }
}
