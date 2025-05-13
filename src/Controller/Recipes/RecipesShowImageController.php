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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /receptes');
            exit;
        }
        
        $recipes = $this->recipesservices->showlimit();
        echo view('recipes/recipesmanagerimage',['recipes'=>$recipes]);
    }
}