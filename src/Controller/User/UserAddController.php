<?php

namespace App\Controller\User;

class UserAddController {
    function useradd(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /register');
            exit;
        }

        echo view('users/addusers');
    }
}