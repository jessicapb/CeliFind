<?php

namespace App\Controller\User;

use App\Infrastructure\Persistence\UserRepository;
use App\Celifind\Entities\User;
use App\Celifind\Exceptions\BuildExceptions;

class UserSaveBDController{
    private \PDO $db;
    private UserRepository $UserRepository;
    
    public function __construct(\PDO $db, UserRepository $UserRepository)
    {
        $this->db = $db;
        $this->UserRepository = $UserRepository;
    }
    
    /* Function save data of subcategories */
    public function saveuser(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            session_start();
            $_SESSION['errors'] = [];
            $name = filter_input(INPUT_POST, 'name');
            $postalcode = filter_input(INPUT_POST, 'postalcode');
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            $status = filter_input(INPUT_POST, 'state');
            
            try {
                $user = new User($name, $email, $postalcode,  $password, null, null, $status);
                if ($this->UserRepository->existsByEmail(trim($email))) {
                    $_SESSION['errors']['email'] = "El correu electrònic ja està registrat.";
                    header('Location: /useradd');
                    exit;
                }
                $this->UserRepository->save($user);
                header('Location: /usersmanager');
            } catch (BuildExceptions $e) {
                $_SESSION['error'] = $e->getMessage();
                header('Location: /useradd');
                exit;
            }
        }
    }
}
?>