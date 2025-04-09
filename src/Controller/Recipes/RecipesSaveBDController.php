<?php

namespace App\Controller\Recipes;

use App\Infrastructure\Persistence\RecipesRepository;
use App\Celifind\Entities\Recipes;
use App\Celifind\Exceptions\BuildExceptions;

class RecipesSaveBDController{
    private \PDO $db;
    private RecipesRepository $RecipesRepository;

    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->RecipesRepository = new RecipesRepository($db);
    }

    public function saverecipes(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Start the session
            session_start();
            $_SESSION['errors'] = [];
            
            // Assign fields
            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $ingredients = filter_input(INPUT_POST, 'ingredients');
            $people = filter_input(INPUT_POST, 'people');
            $duration = filter_input(INPUT_POST, 'duration');
            $instruction = filter_input(INPUT_POST, 'instruction');
            
            // Upload image
            // Comprobamos si hay un campo image y si se ha subido correctamente la imagen
            // Si funciona correctamente guarda la imagen dentro de $imagenData
            // Se pone tmp_name porque cuando subimos la imagen temporalmente se guarda en la carpeta tmp
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageData = file_get_contents($_FILES['image']['tmp_name']);
            } else {
                $imageData = '';
            }
            
            try {
                //Create the recipes
                $recipes = new Recipes(null, $name, $description, $ingredients, $people, $duration, $instruction, $imageData);
                // Validate if the name exists
                if($this->RecipesRepository->exists($name)){
                    $_SESSION['errors']['name'] = "El nom ja està registrar. ";
                    header('Location: /recipesadd');
                    exit;
                }
                
                // If everything is okay, save the recipes
                $this->RecipesRepository->save($recipes);
                header('Location: /recipesmanager');
            } catch (BuildExceptions $e) {
                $_SESSION['error'] = $e->getMessage();
                header('Location: /recipesadd');
                exit;
            }
        }
    }
}