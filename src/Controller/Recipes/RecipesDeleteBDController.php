<?php

namespace App\Controller\Recipes;

use App\Infrastructure\Persistence\RecipesRepository;
use App\Celifind\Services\RecipesServices;
use App\Celifind\Entities\Recipes;

class RecipesDeleteBDController{
    private RecipesRepository $recipesRepository;
    private RecipesServices $recipesServices;
    
    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->recipesRepository = new RecipesRepository($db);
        $this->recipesServices = new RecipesServices($db, $this->recipesRepository);
    }

    function deleterecipes(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /receptes');
            exit;
        }
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_input(INPUT_POST, 'id');
            if($this->recipesServices->delete($id)){
                header('Location: /recipesmanager?deleted=true');
                exit();
            }
        }        
    }    
}