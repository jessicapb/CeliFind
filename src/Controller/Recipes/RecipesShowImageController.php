<?php

namespace App\Controller\Recipes;

use App\Celifind\Services\RecipesServices;
use App\Celifind\Entities\Recipes;

class RecipesShowImageController{
    private $recipesservices;
    
    public function __construct(RecipesServices $recipesservices){
        $this->recipesservices = $recipesservices;
    }
    
    function recipesshowimage(){
        $recipes = $this->recipesservices->showlimit();
        echo view('recipes/recipesmanagerimage',['recipes'=>$recipes]);
    }
}