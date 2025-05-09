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
                $folder = '/home/linux/CeliFind/img/recepte/imagesbd/';
                $fileName = $_FILES['image']['name'];
                $destination = $folder . $fileName;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                    $imageData = '/img/recepte/imagesbd/' . $fileName;
                } else {
                    $_SESSION['errors']['image'] = "No s'ha pogut guardar la imatge.";
                    header('Location: /recipesupdates?id=' . urlencode($id));
                    exit;
                }
            }else{
                $imageData = '';
            }
            
            try {
                //Update the recipes
                $recipes = new Recipes(null, $name, $description, $ingredients, $nutritionalinformation, $people, $duration, $instruction, $imageData);
                
                // Validate if the name exists
                if ($this->recipesservices->existsRepository($name, $id)) {
                    $_SESSION['errors']['name'] = 'El nom ja està registrat';
                    header('Location: /recipesupdates?id=' . urlencode($id));
                    exit;
                }
                
                // If everything is okay, update the recipes
                $this->recipesservices->update($recipes);
                header('Location: /recipesmanager');
            } catch (BuildExceptions $e) {
                $_SESSION['errors']['general'] = $e->getMessage();
                header('Location: /recipesupdates?id=' . urlencode($id));
                exit;
            }
        }
    }
}