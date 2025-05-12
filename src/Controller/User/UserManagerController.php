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
        $users = $this->userRepository->showlimit();
        echo view('users/usersmanager',['users'=>$users]);
    }
}