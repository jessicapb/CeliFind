<?php

namespace App\Infrastructure\Persistence;

use App\Celifind\Entities\Category;
use App\Celifind\Exceptions\BuildExceptions;

class CategoryRepository
{
    private \PDO $db;
    
    function __construct(\PDO $db)
    {
        $this->db = $db;
    }
    
    /* function to get all of the categories */
    // Cambiar por Objetos que devuelva objetos pasarle las categorias --> Preguntar
    function getall(): array
    {
        $result_categories = [];
        $sql = $this->db->prepare("SELECT * FROM categories");
        $sql->execute();
        $categories = $sql->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($categories as $category) {
            $category['subcategories'] = [];
            
            $sql = $this->db->prepare("SELECT * FROM subcategories WHERE idcategoria = :idcategoria");
            $sql->execute(['idcategoria' => $category['id']]);
            $subcategories = $sql->fetchAll(\PDO::FETCH_ASSOC);
            
            $category['subcategories'] = $subcategories;
            $result_categories[] = $category;
        }
        return $result_categories;
    }
    
    
    
    /* Query SQL Create */
    function save(Category $category)
    {
        try {
            $sql = $this->db->prepare("INSERT INTO categories(id, name, description, image) VALUES(:id,:name, :description, :image)");
            $sql->execute([
                'id' => $category->getId(),
                'name' => trim($category->getName()),
                'description' => trim($category->getDescription()),
                'image' => $category->getImage(),
            ]);
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error saving product:" . $e->getMessage());
        }
    }
    
    /* Query SQL Exists */
    function exists(string $name): bool
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM categories WHERE name = :name");
            $stmt->execute(['name' => $name]);
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $ex) {
            throw new BuildExceptions("Error checking if the category exists:" . $ex->getMessage());
        }
    }
    
    /* Query SQL Exists */
    function existsCategory(string $name, int $id): bool
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM categories WHERE name = :name AND id != :id");
            $stmt->execute(['name' => $name, 'id' => $id]);    
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $ex) {
            throw new BuildExceptions("Error checking if the category exists:" . $ex->getMessage());
        }
    }
    
    /* Query SQL Update */
    function updatecategory(Category $category): void
    {
        try {
            $sql = $this->db->prepare("UPDATE categories SET name = :name, description = :description, image = :image WHERE id = :id");
            $sql->execute([
                'id' => $category->getId(),
                'name' => trim($category->getName()),
                'description' => trim($category->getDescription()),
                'image' => $category->getImage(),
            ]);
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error updating category: " . $e->getMessage());
        }
    }
    
    /* Query SQL Delete */
    function deleteCategory(int $id): bool
    {
        try {
            $sql = $this->db->prepare("DELETE FROM categories WHERE id = :id");
            return $sql->execute([':id' => $id]);
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error deleting category: " . $e->getMessage());
        }
    }
    
    /* Query SQL for found the category by ID */
    function findById(int $id): ?object
    {
        $sql = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
        $sql->execute([
            ':id' => $id
        ]);
        $result = $sql->fetch(\PDO::FETCH_OBJ);
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }
    
    // Query SQL for show limit
    function showlimit(){
        $allcategory = [];
        $sql = $this->db->prepare("SELECT id, SUBSTRING(name, 1, 15) AS name_short, SUBSTRING(description, 1, 12) AS description_short, image FROM categories");
        $sql->execute();
        while($fila = $sql->fetch(\PDO::FETCH_ASSOC)){
            if (empty($fila['name_short'])) {
                $name = null;
            } else {
                $name = $fila['name_short'];
            }
            $categories = new Category($fila['id'], $fila['name_short'], $fila['description_short'], $fila['image']);
            $allcategory[] = $categories;
        }
        return $allcategory;
    }
    
    // Search 
    function searchByName($name): array
    {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE name LIKE :name");
        $stmt->execute(['name' => '%' . $name . '%']);
        $categories = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $result = [];
        foreach ($categories as $category) {
            $result[] = new Category($category["id"], $category["name"], $category["description"], $category["image"]);
        }
        
        return $result;
    }
}