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
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_input(INPUT_POST, 'id');
            if($this->userRepository->deleteUser($id)){
                header('Location: /usersmanager?deleted=true');
                exit();
            }
        } 
    }
}