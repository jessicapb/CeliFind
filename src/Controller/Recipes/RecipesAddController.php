<?php

namespace App\Controller\Recipes;

class RecipesAddController {
    function recipesadd(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /receptes');
            exit;
        }
        
        echo view('recipes/addrecipes');
    }
}