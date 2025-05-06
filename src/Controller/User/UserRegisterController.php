<?php

namespace App\Controller\User;

use App\Infrastructure\Persistence\UserRepository;
use App\Celifind\Entities\User;
use App\Celifind\Exceptions\BuildExceptions;

class UserRegisterController
{
    private \PDO $db;
    private UserRepository $userRepository;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
        $this->userRepository = new UserRepository($db);
    }

    public function showRegister()
    {
        require VIEWS . '/login/register.view.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION['errors'] = [];

            $name = filter_input(INPUT_POST, 'name');
            $email = filter_input(INPUT_POST, 'email');
            $postalcode = filter_input(INPUT_POST, 'postalcode');
            $password = filter_input(INPUT_POST, 'password');
            $status = 1;
            try {
                if ($this->userRepository->existsByEmail($email)) {
                    $_SESSION['errors']['email'] = "El correu electrònic ja està registrat.";
                    header('Location: /register');
                    exit;
                }

                $user = new User($name, $email, $postalcode, $password, null, null, $status);
                $this->userRepository->save($user);

                header('Location: /login');
                exit;
            } catch (BuildExceptions $e) {
                $_SESSION['errors']['general'] = $e->getMessage();
                header('Location: /register');
                exit;
            }
        }
    }
}
