<?php

namespace App\Controller\User;

use App\Infrastructure\Persistence\UserRepository;
use App\Celifind\Entities\User;

class UserSearchBDController{
    private \PDO $db;
    private UserRepository $userRepository;
    
    public function __construct(\PDO $db, UserRepository $userRepository) {
        $this->db = $db;
        $this->userRepository = $userRepository;
    }
    
    public function searchusers() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'name');
            
            if (empty($name)) {
                $_SESSION['no_results'] = true;
                $_SESSION['search_results'] = []; 
                header('Location: /showsearchresultsusers');
                exit;
            }
            
            try {
                $users = $this->userRepository->searchUsersAll($name);
                $_SESSION['search_results'] = $users;
                $_SESSION['no_results'] = empty($users); 
                
                header('Location: /showsearchresultsusers');
                exit;
            } catch (BuildExceptions $e) {
                $_SESSION['error'] = "Error al realitzar la cerca.";
                header('Location: /usersmanager');
                exit;
            }
        }
    }
    
    public function showsearchresultsusers() {
        session_start();
        
        $users = [];
        $noResults = false;
        
        if (isset($_SESSION['search_results']) && isset($_SESSION['no_results'])) {
            $users = $_SESSION['search_results'];
            $noResults = $_SESSION['no_results'];
        }
        unset($_SESSION['search_results'], $_SESSION['no_results']);
        
        echo view('users/usersmanager', ['users' => $users, 'noResults' => $noResults]);
    }
}