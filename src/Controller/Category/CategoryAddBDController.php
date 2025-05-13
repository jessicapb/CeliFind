<?php

namespace App\Controller\Category;

class CategoryAddBDController {
    function categoryadd(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /productview');
            exit;
        }
        
        echo view('category/addcategory');
    }
}