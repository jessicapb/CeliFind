<?php

namespace App\Controller\Recipes;

use App\Celifind\Services\RecipesServices;
use App\Celifind\Entities\Recipes;

class RecipesViewController {
    private $recipesservices;

    public function __construct(RecipesServices $recipesservices){
        $this->recipesservices = $recipesservices;
    }
    
    function recipesview(){
        $recipes  = $this->recipesservices->selectall();
        echo view('recipes/recipes',['recipes'=>$recipes]);
    }
}