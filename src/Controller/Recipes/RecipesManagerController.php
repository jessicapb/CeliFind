<?php

namespace App\Controller\Recipes;

use App\Celifind\Services\RecipesServices;
use App\Celifind\Entities\Recipes;

class RecipesManagerController{
    private $recipesservices;
    
    public function __construct(RecipesServices $recipesservices){
        $this->recipesservices = $recipesservices;
    }
    
    function recipesmanager(){
        $recipes = $this->recipesservices->showlimit();
        echo view('recipes/recipesmanager',['recipes'=>$recipes]);
    }
}
