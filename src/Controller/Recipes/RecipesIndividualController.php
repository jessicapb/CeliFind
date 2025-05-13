<?php

namespace App\Controller\Recipes;


use App\Celifind\Services\RecipesServices;
use App\Celifind\Entities\Recipes;
use App\Celifind\Services\CommentServices;

class RecipesIndividualController{
    private $recipesservices;
    private $commentservices;
    
    public function __construct(RecipesServices $recipesservices, CommentServices $commentservices) {
        $this->commentservices = $commentservices;
        $this->recipesservices = $recipesservices;
    }
    
    function recipesindividual(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_input(INPUT_POST, 'id');
            if($id){ 
                $recipes = $this->recipesservices->findById($id); 
                $comments = $this->commentservices->getCommentsByIdRecipe($id);
                if ($recipes) {
                    echo view('recipes/individualrecipes', ['recipes' => $recipes, 'comments' => $comments]);
                } else {
                    echo view('recipes/individualrecipes', ['recipes' => $recipes]);
                }
            }
        }
    }
}