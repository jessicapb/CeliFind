<?php

namespace App\Controller\Recipes;

use App\Celifind\Services\RecipesServices;
use App\Celifind\Entities\Recipes;
use App\Celifind\Exceptions\BuildExceptions;

class RecipesUpdateBDController{
    private \PDO $db;
    private RecipesServices $recipesservices;
    
    public function __construct(\PDO $db, RecipesServices $recipesservices) {
        $this->db = $db;
        $this->recipesservices = $recipesservices;
    }
    
    // Private function to render the form with errors
    private function FormWithErrorsRecipes($id) {
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
    
    public function updaterecipes(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Start the session
            session_start();
            $_SESSION['errors'] = [];
            
            // Assign fields
            $id = filter_input(INPUT_POST, 'id');
            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $ingredients = filter_input(INPUT_POST, 'ingredients');
            $nutritionalinformation = filter_input(INPUT_POST, 'nutritionalinformation');
            $people = filter_input(INPUT_POST, 'people');
            $duration = filter_input(INPUT_POST, 'duration');
            $instruction = filter_input(INPUT_POST, 'instruction');
            
            $_SESSION['formData'] = [
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'ingredients' => $ingredients,
                'nutritionalinformation' => $nutritionalinformation,
                'people' => $people,
                'duration' => $duration,
                'instruction' => $instruction,
            ];
            
            if (!empty($_FILES['image']['name'])) {
                $folder = '/img/recepte/imagesbd/';
                $fileName = basename($_FILES['image']['name']);
                $destination = $_SERVER['DOCUMENT_ROOT'] . $folder . $fileName;
                
                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                    $imageData = $folder . $fileName;
                } else {
                    $_SESSION['errors']['image'] = "No s'ha pogut guardar la imatge.";
                    $this->FormWithErrorsRecipes($id);
                    exit;
                }
            } else {
                $imageData = '';
            }
            
            try {
                //Update the recipes
                $recipes = new Recipes($id, $name, $description, $ingredients, $nutritionalinformation, $people, $duration, $instruction, $imageData);
                // Validate if the name exists
                if ($this->recipesservices->existsRecipes($name, $id)) {
                    $_SESSION['errors']['name'] = 'El nom ja està registrat';
                    $this->FormWithErrorsRecipes($id);
                    exit;
                }
                // If everything is okay, update the recipes
                $this->recipesservices->update($recipes);
                $_SESSION['success_update'] = true;
                header('Location: /recipesmanager');
            } catch (BuildExceptions $e) {
                $_SESSION['errors']['general'] = $e->getMessage();
                $this->FormWithErrorsRecipes($id);
                exit;
            }
        }
    }
}