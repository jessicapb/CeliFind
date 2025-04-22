<?php

namespace App\Controller\Recipes;

use App\Infrastructure\Persistence\RecipesRepository;
use App\Celifind\Entities\Recipes;

class RecipesManagerController{
    private $recipesRepository;
    
    public function __construct(RecipesRepository $recipesRepository){
        $this->recipesRepository = $recipesRepository;
    }
    
    function recipesmanager(){
        $recipes = $this->recipesRepository->showlimit();
        $allrecipes = [];
        foreach($recipes as $fila){
            $allrecipes [] = new Recipes($fila['id'], $fila['name_short'], $fila['description_short'], $fila['ingredients_short'], $fila['people'], $fila['duration'], $fila['instruction_short'], $fila['image']);
        }
        echo view('recipes/recipesmanager',['products'=>$allrecipes]);
    }
}
