<?php
namespace App\Infrastructure\Persistence;

use App\Celifind\Entities\Product;
use App\Celifind\Exceptions\BuildExceptions;

class ProductRepository{
    private \PDO $db;

    function __construct(\PDO $db){
        $this->db = $db;
    }

    function exists(string $name): bool{
        try {
            $stmt = $this->db->prepare("SELECT * FROM products WHERE name = :name");
            $stmt->execute(['name' => $name]);
            if($stmt->rowCount()> 0){
                return true;
            }else{
                return false;
            }
        } catch (\PDOException $ex) {
            throw new BuildExceptions("Error checking if the product exists:" . $ex->getMessage());
        }
    }

    function save(Product $product){
        try {
            $sql = $this->db->prepare("INSERT INTO products(id, name, description, ingredients, nutritionalinformation, price, brand, image, weight, state, idsubcategory) VALUES(:id,:name, :description, :ingredients, :nutritionalinformation, :price, :brand, :image, :weight, :state, :idsubcategory)");
            $sql->execute([
                'id' => $product->getId(),
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'ingredients' => $product->getIngredients(),
                'nutritionalinformation' => $product->getNutritionalInformation(),
                'price' => $product->getPrice(),
                'brand' => $product->getBrand(),
                'image' => $product->getImage(),
                'weight' => $product->getWeight(),
                'state' => $product->getState(),
                'idsubcategory' => $product->getSubCategoryId(),
            ]);
            
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error saving product:" . $e->getMessage());
        }
    }

    function showlimit(){
        $allproducts = [];
        $sql = $this->db->prepare("SELECT id, SUBSTRING(name, 1, 20) AS name_short, SUBSTRING(description, 1, 14) AS description_short, SUBSTRING(ingredients, 1, 15) AS ingredients_short, 
                                    SUBSTRING(nutritionalinformation, 1, 30) AS nutritionalinformation_short, price, brand, weight, state, idsubcategory FROM products");
        $sql->execute();
        $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) != 0) {
            return $result;
        } else {
            return [];
        }
    }

    function findById(int $id): ?object{
        $sql = $this->db->prepare("SELECT * FROM products WHERE id = :id");
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

    function updateProduct(Product $product){
        try {
            $sql = $this->db->prepare("UPDATE ");
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error saving product:" . $e->getMessage());
        }
    }

    function deleteProduct(int $id): bool {
        $sql = $this->db->prepare("DELETE FROM products WHERE id = :id");
        return $sql->execute([
            ':id' => $id
        ]);
    }

    function searchproduct(string $name) {
        try {
            $sql = $this->db->prepare("SELECT * FROM products WHERE name LIKE '% . $name .%' ORDER BY name");
            $sql->execute();
            dd($sql);
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error searching product:" . $e->getMessage());
        }
    }    
}
