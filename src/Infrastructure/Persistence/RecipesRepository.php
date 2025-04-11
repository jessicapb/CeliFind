<?php

namespace App\Infrastructure\Persistence;

use App\Celifind\Entities\Recipes;
use App\Celifind\Exceptions\BuildExceptions;

class RecipesRepository{
    private \PDO $db;

    function __construct(\PDO $db){
        $this->db = $db;
    }

    // Exists
    function exists(string $name): bool{
        try {
            $stmt = $this->db->prepare("SELECT * FROM recipes WHERE name = :name");
            $stmt->execute(['name' => $name]);
            if($stmt->rowCount()> 0){
                return true;
            }else{
                return false;
            }
        } catch (\PDOException $ex) {
            throw new BuildExceptions("Error checking if the recipes exists:" . $ex->getMessage());
        }
    }

    // Insert
    function save(Recipes $recipes){
        try {
            $sql = $this->db->prepare("INSERT INTO recipes(id, name, description, ingredients, people, duration, instruction, image) VALUES(:id, :name, :description, :ingredients, :people, :duration, :instruction, :image)");
            $sql->execute([
                'id' => $recipes->getId(),
                'name' => $recipes->getName(),
                'description' => $recipes->getDescription(),
                'ingredients' => $recipes->getIngredients(),
                'people' => $recipes->getPeople(),
                'duration' => $recipes->getDuration(),
                'instruction' => $recipes->getInstruction(),
                'image' => $recipes->getImage()
            ]);
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error saving recipes:" . $e->getMessage());
        }
    }

    // Select limit
    function showlimit(){
        $allrecipes = [];
        $sql = $this->db->prepare("SELECT id, SUBSTRING(name, 1, 15) AS name_short, SUBSTRING(description, 1, 12) AS description_short, SUBSTRING(ingredients, 1, 13) AS ingredients_short, 
                                    people, duration, SUBSTRING(instruction, 1, 8) AS instruction_short, image FROM recipes");
        $sql->execute();
        $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) != 0) {
            return $result;
        } else {
            return [];
        }
    }
}