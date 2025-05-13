<?php

namespace App\Controller\User;

use App\Infrastructure\Persistence\UserRepository;
use App\Celifind\Entities\Product;

class UserManagerController {
    private $userRepository;
    
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    
    function usersmanager(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /register');
            exit;
        }
        
        $users = $this->userRepository->showlimit();
        echo view('users/usersmanager',['users'=>$users]);
    }
}