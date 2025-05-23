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
    
    function existsRepository(string $name, int $id):bool{
        return $this->RecipesRepository->existsRepository($name, $id);
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
    
    function findByIdUpdate(int $id){
        return $this->RecipesRepository->findByIdUpdate($id);
    }
    
    function selectall(){
        return $this->RecipesRepository->selectall();
    }
    
    function delete(int $id){
        return $this->RecipesRepository->deleteRecipes($id);
    }
    
    function searchrecipes($name){
        if(empty($name)){
            return $this->RecipesRepository->showlimit();
        }
        return $this->RecipesRepository->searchrecipes($name);
    }
    
    function searchrecipesall($name){
        if(empty($name)){
            return $this->RecipesRepository->selectall();
        }
        return $this->RecipesRepository->searchrecipesall($name);
    }
}