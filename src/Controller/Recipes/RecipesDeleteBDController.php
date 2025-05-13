<?php

namespace App\Controller\Recipes;

use App\Infrastructure\Persistence\RecipesRepository;
use App\Celifind\Services\RecipesServices;
use App\Celifind\Entities\Recipes;

class RecipesDeleteBDController{
    private \PDO $db;
    private RecipesRepository $recipesRepository;
    private RecipesServices $recipesServices;
    
    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->recipesRepository = new RecipesRepository($db);
        $this->recipesServices = new RecipesServices($db, $this->recipesRepository);
    }

    function deleterecipes(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_input(INPUT_POST, 'id');
            if($this->recipesServices->delete($id)){
                header('Location: /recipesmanager?deleted=true');
                exit();
            }
        }        
    }    
}