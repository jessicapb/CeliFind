<?php

namespace App\Controller\Recipes;


use App\Celifind\Services\RecipesServices;
use App\Celifind\Entities\Recipes;
use App\Celifind\Services\CommentServices;
use App\Celifind\Entities\Comments;

class RecipesIndividualController
{
    private $recipesservices;
    private $commentservices;

    public function __construct(RecipesServices $recipesservices, CommentServices $commentservices)
    {
        $this->commentservices = $commentservices;
        $this->recipesservices = $recipesservices;
    }

    public function recipesindividual()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id');

            if ($id) {
                $recipes = $this->recipesservices->findById($id);
                $comments = $this->commentservices->getCommentsByIdRecipe($id);

                session_start();
                $user = $_SESSION['user'] ?? null;

                $formData = [
                    'idrecipes' => $recipes->getId(),
                    'iduser' => $user['id'] ?? '',
                    'id' => '',
                    'name' => '',
                    'description' => '',
                ];

                echo view('recipes/individualrecipes', [
                    'recipes' => $recipes,
                    'comments' => $comments,
                    'formData' => $formData,
                    'errors' => [],
                ]);
            }
        }
    }
}