<?php

namespace App\Controller\User;

use App\Infrastructure\Persistence\UserRepository;
use App\Celifind\Entities\User;

class UserDeleteBDController{
    private UserRepository $userRepository;
    
    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->userRepository = new UserRepository($db);
    }
    
    function deleteuser(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /register');
            exit;
        }
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_input(INPUT_POST, 'id');
            if($this->userRepository->deleteUser($id)){
                header('Location: /usersmanager?deleted=true');
                exit();
            }
        } 
    }
}