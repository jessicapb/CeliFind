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
    
    // Exists name and id
    function existsRecipes(string $name, int $id): bool{
        try {
            $stmt = $this->db->prepare("SELECT * FROM recipes WHERE name = :name AND id != :id");
            $stmt->execute(['name' => $name, 'id' => $id]);    
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $ex) {
            throw new BuildExceptions("Error checking if the recipes exists:" . $ex->getMessage());
        }
    }
    
    // Insert
    function save(Recipes $recipes){
        try {
            $sql = $this->db->prepare("INSERT INTO recipes(id, name, description, ingredients, nutritionalinformation, people, duration, instruction, image) VALUES(:id, :name, :description, :ingredients, :nutritionalinformation, :people, :duration, :instruction, :image)");
            $sql->execute([
                'id' => $recipes->getId(),
                'name' => $recipes->getName(),
                'description' => $recipes->getDescription(),
                'ingredients' => $recipes->getIngredients(),
                'nutritionalinformation' => $recipes->getNutritionalInformation(),
                'people' => $recipes->getPeople(),
                'duration' => $recipes->getDuration(),
                'instruction' => $recipes->getInstruction(),
                'image' => $recipes->getImage()
            ]);
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error saving recipes:" . $e->getMessage());
        }
    }
    
    // Select with id 
    public function findById(int $id): ?Recipes {
        $sql = $this->db->prepare("SELECT * FROM recipes WHERE id = :id");
        $sql->bindParam(':id', $id, \PDO::PARAM_INT);
        $sql->execute();
        
        if ($row = $sql->fetch(\PDO::FETCH_ASSOC)) {
            return new Recipes(
                $row['id'],
                $row['name'],
                $row['description'],
                $row['ingredients'],
                $row['nutritionalinformation'],
                $row['people'],
                $row['duration'],
                $row['instruction'],
                $row['image']
            );
        }
        return null;
    }
    
    // Select with id for the update
    public function findByIdUpdate(int $id): ?object {
        $sql = $this->db->prepare("SELECT * FROM recipes WHERE id = :id");
        $sql->bindParam(':id', $id, \PDO::PARAM_INT);
        $sql->execute();
        
        $result = $sql->fetch(\PDO::FETCH_OBJ);
        if($result){
                return $result;
        }else{
                return null;
        }
    }
    
    // Select limit
    function showlimit(){
        $allrecipes = [];
        $sql = $this->db->prepare("SELECT id, SUBSTRING(name, 1, 15) AS name_short, SUBSTRING(description, 1, 12) AS description_short, SUBSTRING(ingredients, 1, 13) AS ingredients_short, 
                                    SUBSTRING(nutritionalinformation, 1, 13) AS nutritionalinformation_short, people, duration, SUBSTRING(instruction, 1, 8) AS instruction_short, image FROM recipes");
        $sql->execute();
        while($fila = $sql->fetch(\PDO::FETCH_ASSOC)){
            $recipes = new Recipes($fila['id'], $fila['name_short'], $fila['description_short'], $fila['ingredients_short'], $fila['nutritionalinformation_short'], $fila['people'], $fila['duration'], $fila['instruction_short'], $fila['image']);
            $allrecipes[] = $recipes;
        }
        return $allrecipes;
    }
    
    // Select all
    function selectall(){
        $allrecipes = [];
        $sql = $this->db->prepare("SELECT id,name,SUBSTRING(description,1,170) as description_short ,ingredients,nutritionalinformation,people,duration,instruction,image FROM recipes");
        $sql->execute();
        while($fila = $sql->fetch(\PDO::FETCH_ASSOC)){
            $recipes = new Recipes($fila['id'], $fila['name'], $fila['description_short'], $fila['ingredients'], $fila['nutritionalinformation'], $fila['people'], $fila['duration'], $fila['instruction'], $fila['image']);
            $allrecipes[] = $recipes;
        }
        return $allrecipes;
    }
    
    // Update
    function updateRecipes(Recipes $recipes){
        try {
            $sql = $this->db->prepare("UPDATE recipes SET name = :name, description = :description, ingredients = :ingredients, nutritionalinformation = :nutritionalinformation, 
                                        people = :people, duration = :duration, instruction = :instruction, image = :image  WHERE id = :id");
            $sql->execute([
                'id' => $recipes->getId(),
                'name' => $recipes->getName(),
                'description' => $recipes->getDescription(),
                'ingredients' => $recipes->getIngredients(),
                'nutritionalinformation' => $recipes->getNutritionalInformation(),
                'people' => $recipes->getPeople(),
                'duration' => $recipes->getDuration(),
                'instruction' => $recipes->getInstruction(),
                'image' => $recipes->getImage()
            ]);
            return true;
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error updating the recipes:" . $e->getMessage());
        }
    }
    
    // Delete
    function deleteRecipes(int $id): bool {
        $sql = $this->db->prepare("DELETE FROM recipes WHERE id = :id");
        return $sql->execute([
            ':id' => $id
        ]);
    }
    
    // Search 
    function searchrecipes(string $name):array {
        $stmt = $this->db->prepare("SELECT id, SUBSTRING(name, 1, 15) AS name_short, SUBSTRING(description, 1, 12) AS description_short, SUBSTRING(ingredients, 1, 13) AS ingredients_short, 
                                    SUBSTRING(nutritionalinformation, 1, 13) AS nutritionalinformation_short, people, duration, SUBSTRING(instruction, 1, 8) AS instruction_short, image 
                                    FROM recipes WHERE name LIKE :name");
        $stmt->execute(['name' => '%' . $name . '%']);
        $recipes = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $result = [];
        foreach($recipes as $recipe){
            $result[] = new Recipes($recipe['id'], $recipe['name_short'], $recipe['description_short'], $recipe['ingredients_short'], $recipe['nutritionalinformation_short'], $recipe['people'], $recipe['duration'], $recipe['instruction_short'], $recipe['image']);
        }
        return $result;
    }  
    
    // Search all recipes
    function searchrecipesall(string $name):array {
        $stmt = $this->db->prepare("SELECT * FROM recipes  WHERE name LIKE :name");
        $stmt->execute(['name' => '%' . $name . '%']);
        $recipesall = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $result = [];
        foreach($recipesall as $recipe){
            $result[] = new Recipes($recipe['id'], $recipe['name'], $recipe['description'], $recipe['ingredients'], $recipe['nutritionalinformation'], $recipe['people'], $recipe['duration'], $recipe['instruction'], $recipe['image']);
        }
        return $result;
    } 
}