<?php

namespace App\Infrastructure\Persistence;

use App\Celifind\Entities\Subcategory;
use App\Celifind\Exceptions\BuildExceptions;

class SubcategoryRepository
{
    private \PDO $db;
    
    function __construct(\PDO $db)
    {
        $this->db = $db;
    }
    
    /* function to get all the subcategories */
    function getallsub(): array
    {
        $result_subcategories = [];
        $sql = $this->db->prepare("SELECT * FROM subcategories");
        $sql->execute();
        $subcategories = $sql->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($subcategories as $subcategory) {
            $subcategory['categories'] = [];
            
            $sql = $this->db->prepare("SELECT * FROM categories WHERE id = :idcategoria");
            $sql->execute(['idcategoria' => $subcategory['id']]);
            $categories = $sql->fetchAll(\PDO::FETCH_ASSOC);
            
            $subcategory['categories'] = $categories;
            $result_subcategories[] = $subcategory;
        }
        return $result_subcategories;
    }
    
    /* Query SQL Search */
    function searchByNameSubCategories($name): array{
        $stmt = $this->db->prepare("SELECT * FROM subcategories WHERE name LIKE :name");
        $stmt->execute(['name' => '%' . $name . '%']);
        $subcategories = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        //dd($subcategories);
        $result_subcategories = [];
        foreach ($subcategories as $subcategory) {
            $subcategory['categories'] = [];
            
            $sql = $this->db->prepare("SELECT * FROM categories WHERE id = :idcategoria");
            $sql->execute(['idcategoria' => $subcategory['id']]);
            $categories = $sql->fetchAll(\PDO::FETCH_ASSOC);
            
            $subcategory['categories'] = $categories;
            $result_subcategories[] = $subcategory;
            }
        return $result_subcategories;
    }
    
    /* Query SQL Create */
    function save(Subcategory $subcategory)
    {
        try {
            $sql = $this->db->prepare("INSERT INTO subcategories(name, description, idcategoria) VALUES(:name, :description, :idcategoria)");
            $sql->execute([
                'name' => trim($subcategory->getName()),
                'description' => trim($subcategory->getDescription()),
                'idcategoria' => $subcategory->getIdcategoria(),
            ]);
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error saving subcategory:" . $e->getMessage());
        }
    }
    
    /* Query SQL Exists */
    function exists(string $name): bool
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM subcategories WHERE name = :name");
            $stmt->execute(['name' => $name]);
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $ex) {
            throw new BuildExceptions("Error checking if the subcategory exists:" . $ex->getMessage());
        }
    }
    
    /* Query SQL Exists */
    function existsSubcategory(string $name, int $id): bool
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM subcategories WHERE name = :name AND id != :id");
            $stmt->execute(['name' => $name
                            , 'id' => $id]);    
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $ex) {
            throw new BuildExceptions("Error checking if the subcategory exists:" . $ex->getMessage());
        }
    }
    
    /* Query SQL Update */
    function updatesubcategory(Subcategory $subcategory)
    {
        try {
            $sql = $this->db->prepare("UPDATE subcategories SET name = :name, description = :description, idcategoria = :idcategoria WHERE id = :id");
            $sql->execute([
                'id' => $subcategory->getId(),
                'name' => trim($subcategory->getName()),
                'description' => trim($subcategory->getDescription()),
                'idcategoria' => $subcategory->getIdcategoria()
            ]);
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error updating subcategory: " . $e->getMessage());
        }
    }
    
    /* Query SQL Delete */
    function deleteSubcategory(int $id): bool
    {
        try {
            $sql = $this->db->prepare("DELETE FROM subcategories WHERE id = :id");
            return $sql->execute([':id' => $id]);
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error deleting subcategory: " . $e->getMessage());
        }
    }
    
    /* Query SQL for found the subcategory by ID */
    function findById(int $id): ?object
    {
        $sql = $this->db->prepare("SELECT * FROM subcategories WHERE id = :id");
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
    
    // Select limit
    function showlimit(){
        $allsubcategory = [];
        $sql = $this->db->prepare("SELECT id, SUBSTRING(name, 1, 15) AS name_short, SUBSTRING(description, 1, 12) AS description_short, image, idcategoria FROM subcategories");
        $sql->execute();
        $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) != 0) {
            return $result;
        } else {
            return [];
        }
    } 
    
}