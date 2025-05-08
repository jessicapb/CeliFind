<?php

namespace App\Controller\User;

use App\Infrastructure\Persistence\UserRepository;

class UserLoginController
{
    private \PDO $db;
    private UserRepository $userRepository;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
        $this->userRepository = new UserRepository($db);
    }

    public function showLogin()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['user']['id'])) {
            // Si la sesión está iniciada, redirige según el rol
            if (isset($_SESSION['user']['status']) && $_SESSION['user']['status'] == 2) {
                header('Location: /manager');
            } else {
                header('Location: /productview');
            }
            exit;
        }
        
        require VIEWS . '/login/login.view.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION['login_error'] = null;

            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');

            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($row) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user'] = [
                        'id' => $row['id'],
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'status' => $row['status']
                    ];
                    header('Location: /productview');
                    exit;
                } else {
                    $_SESSION['login_error'] = "Contrasenya incorrecta.";
                }
            } else {
                $_SESSION['login_error'] = "El correu electrònic no existeix.";
            }
            header('Location: /login');
            exit;
        }
    }
}
