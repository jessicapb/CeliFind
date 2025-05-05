<?php

namespace App\Controller\Recipes;


use App\Celifind\Services\RecipesServices;
use App\Celifind\Entities\Recipes;

class RecipesIndividualController{
    private $recipesservices;
    
    public function __construct(RecipesServices $recipesservices){
        $this->recipesservices = $recipesservices;
    }
    
    function recipesindividual(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_input(INPUT_POST, 'id');
            if($id){
                $recipes = $this->recipesservices->findById($id); 
                if ($recipes) {
                    echo view('recipes/individualrecipes', ['recipes' => $recipes]);
                } 
            }
        }
    }
}