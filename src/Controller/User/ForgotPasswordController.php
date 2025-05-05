<?php
namespace App\Controller\User;

use App\Infrastructure\Persistence\UserRepository;

class ForgotPasswordController {
    private \PDO $db;
    private UserRepository $userRepository;

    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->userRepository = new UserRepository($db);
    }

    public function showForgotPassword() {
        require VIEWS . '/login/forgotpassword.view.php';
    }

    public function sendResetLink() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION['errors'] = [];
            $email = filter_input(INPUT_POST, 'email');
            $user = $this->userRepository->findByEmail($email);
            if (!$user) {
                $_SESSION['errors']['email'] = 'No existeix cap usuari amb aquest correu.';
                header('Location: /forgotpassword');
                exit;
            }
            // TODO Voy por aquí
            $token = bin2hex(random_bytes(32));
            $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
            $this->userRepository->setResetToken($email, $token, $expiry);
            
            mail($email, 'Recuperació de contrasenya', "Entra a aquest enllaç per restablir la teva contrasenya: http://localhost/celifind/reset-password?token=$token");
            $_SESSION['success'] = 'Tens un email amb instruccions per restablir la contrasenya.';
            header('Location: /forgotpassword');
            exit;
        }
    }
}
