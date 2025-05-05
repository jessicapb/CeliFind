<?php

namespace App\Celifind\Services;

use App\Infrastructure\Persistence\RecipesRepository;
use App\Celifind\Entities\Recipes;

class RecipesServices{
    private \PDO $db;
    private RecipesRepository $RecipesRepository;
    
    function __construct(\PDO $db, RecipesRepository $RecipesRepository){
        $this->db = $db;
        $this->RecipesRepository = $RecipesRepository;
    }
    
    function exists(string $name):bool{
        return $this->RecipesRepository->exists($name);
    }
    
    function save(Recipes $recipes){
        $recipes = $this->RecipesRepository->save($recipes);
        return $recipes;
    }
    
    function showlimit(){
        return $this->RecipesRepository->showlimit();
    }
    
    function findById(int $id){
        return $this->RecipesRepository->findById($id);
    }
    
    function selectall(){
        return $this->RecipesRepository->selectall();
    }
    
    function delete(int $id){
        return $this->RecipesRepository->deleteRecipes($id);
    }
}