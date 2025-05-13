<?php

namespace App\Controller\Recipes;

use App\Celifind\Services\RecipesServices;
use App\Celifind\Entities\Recipes;

class RecipesUpdateController{
    private $recipesservices;
    
    public function __construct(\PDO $db, RecipesServices $recipesservices) {
        $this->db = $db;
        $this->recipesservices = $recipesservices;
    }
    
    function recipesupdates(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /receptes');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            session_start();
            $id = filter_input(INPUT_GET, 'id');
            
            if ($id) {
                $fila = $this->recipesservices->findByIdUpdate($id);
                $errors = $_SESSION['errors'] ?? [];
                unset($_SESSION['errors']);
                
                $formData = $_SESSION['formData'] ?? null;
                unset($_SESSION['formData']);
                
                if (!$formData && $fila) {
                    $formData = [
                        'id' => $fila->id,
                        'name' => $fila->name,
                        'description' => $fila->description,
                        'ingredients' => $fila->ingredients,
                        'nutritionalinformation' => $fila->nutritionalinformation,
                        'people' => $fila->people,
                        'duration' => $fila->duration,
                        'instruction' => $fila->instruction,
                        'image' => $fila->image,
                    ];
                }
                
                echo view('recipes/recipesupdate', [
                    'formData' => $formData,
                    'errors' => $errors,
                ]);
            }
        }
    }
}