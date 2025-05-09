<?php

namespace App\Controller\Recipes;

use App\Infrastructure\Persistence\RecipesRepository;
use App\Celifind\Services\RecipesServices;
use App\Celifind\Entities\Recipes;
use App\Celifind\Exceptions\BuildExceptions;

class RecipesSaveBDController{
    private \PDO $db;
    private RecipesRepository $RecipesRepository;
    private RecipesServices $RecipesServices;
    
    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->RecipesRepository = new RecipesRepository($db);
        $this->RecipesServices = new RecipesServices($db, $this->RecipesRepository);
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
            $nutritionalinformation = filter_input(INPUT_POST, 'nutritionalinformation');
            $people = filter_input(INPUT_POST, 'people');
            $duration = filter_input(INPUT_POST, 'duration');
            $instruction = filter_input(INPUT_POST, 'instruction');
            
            if (!empty($_FILES['image']['name'])) {
                $folder = '/home/linux/CeliFind/img/recepte/imagesbd/';
                $fileName = $_FILES['image']['name'];
                $destination = $folder . $fileName;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                    $imageData = '/img/recepte/imagesbd/' . $fileName;
                } else {
                    $_SESSION['errors']['image'] = "No s'ha pogut guardar la imatge.";
                    header('Location: /recipesadd');
                    exit;
                }
            }else{
                $imageData = '';
            }
            
            try {
                //Create the recipes
                $recipes = new Recipes(null, $name, $description, $ingredients, $nutritionalinformation, $people, $duration, $instruction, $imageData);
                // Validate if the name exists
                if($this->RecipesServices->exists($name)){
                    $_SESSION['errors']['name'] = "El nom ja està registrar. ";
                    header('Location: /recipesadd');
                    exit;
                }
                
                // If everything is okay, save the recipes
                $this->RecipesServices->save($recipes);
                header('Location: /recipesmanager');
            } catch (BuildExceptions $e) {
                $_SESSION['error'] = $e->getMessage();
                header('Location: /recipesadd');
                exit;
            }
        }
    }
}