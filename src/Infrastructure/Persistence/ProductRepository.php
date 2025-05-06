<?php

namespace App\Infrastructure\Persistence;

use App\Celifind\Entities\Product;
use App\Celifind\Exceptions\BuildExceptions;

class ProductRepository{
    private \PDO $db;
    
    function __construct(\PDO $db){
        $this->db = $db;
    }
    
    // Exists
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
    
    // Insert 
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
    
    // Select limit
    function showlimit(){
        $allproducts = [];
        $sql = $this->db->prepare("SELECT id, SUBSTRING(name, 1, 15) AS name_short, SUBSTRING(description, 1, 12) AS description_short, SUBSTRING(ingredients, 1, 14) AS ingredients_short, 
                                    SUBSTRING(nutritionalinformation, 1, 12) AS nutritionalinformation_short, price, SUBSTRING(brand, 1, 12) AS brand_short, image, weight, state, idsubcategory FROM products");
        $sql->execute();
        while($fila = $sql->fetch(\PDO::FETCH_ASSOC)){
            if (empty($fila['nutritionalinformation_short'])) {
                $nutritionalinformation = null;
            } else {
                $nutritionalinformation = $fila['nutritionalinformation_short'];
            }
            $products = new Product($fila['id'], $fila['name_short'], $fila['description_short'], $fila['ingredients_short'], $nutritionalinformation, $fila['price'], $fila['brand_short'], $fila['image'], $fila['weight'], $fila['state'], $fila['idsubcategory']);
            $allproducts[] = $products;
        }
        return $allproducts;
    }
    
    // Select with state 1
    function stateone(){
        $allproducts = [];
        $sql = $this->db->prepare("SELECT id, name, description, SUBSTRING(ingredients, 1, 13) AS ingredients_short, 
                                        SUBSTRING(nutritionalinformation, 1, 20) AS nutritionalinformation_short, price, SUBSTRING(brand, 1, 12) AS brand_short, image, weight, state, idsubcategory FROM products
                                        WHERE state = 1");
        $sql->execute();
        while($fila = $sql->fetch(\PDO::FETCH_ASSOC)){
            if (empty($fila['nutritionalinformation_short'])) {
                    $nutritionalinformation = null;
            } else {
                $nutritionalinformation = $fila['nutritionalinformation_short'];
            }
            $products = new Product($fila['id'], $fila['name'], $fila['description'], $fila['ingredients_short'], $nutritionalinformation, $fila['price'], $fila['brand_short'], $fila['image'], $fila['weight'], $fila['state'], $fila['idsubcategory']);
            $allproducts[] = $products;
        }
        return $allproducts;
    }
    
    // Select 4 with state 1
    function stateonelimit(){
        $allproducts = [];
        $sql = $this->db->prepare("SELECT id, name, description, SUBSTRING(ingredients, 1, 13) AS ingredients_short, 
                                        SUBSTRING(nutritionalinformation, 1, 20) AS nutritionalinformation_short, price, SUBSTRING(brand, 1, 12) AS brand_short, image, weight, state, idsubcategory FROM products
                                        WHERE state = 1 LIMIT 4");
        $sql->execute();
        while($fila = $sql->fetch(\PDO::FETCH_ASSOC)){
            if (empty($fila['nutritionalinformation_short'])) {
                    $nutritionalinformation = null;
            } else {
                $nutritionalinformation = $fila['nutritionalinformation_short'];
            }
            $products = new Product($fila['id'], $fila['name'], $fila['description'], $fila['ingredients_short'], $nutritionalinformation, $fila['price'], $fila['brand_short'], $fila['image'], $fila['weight'], $fila['state'], $fila['idsubcategory']);
            $allproducts[] = $products;
        }
        return $allproducts;
    }
    
    // Select with id 
    public function findById(int $id): ?Product {
        $sql = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $sql->bindParam(':id', $id, \PDO::PARAM_INT);
        $sql->execute();
        
        if ($row = $sql->fetch(\PDO::FETCH_ASSOC)) {
            return new Product(
                $row['id'],
                $row['name'],
                $row['description'],
                $row['ingredients'],
                $row['nutritionalinformation'],
                $row['price'],
                $row['brand'],
                $row['image'],
                $row['weight'],
                $row['state'],
                $row['subcategory_id']
            );
        }
        return null;
    }
    
    // Update
    function updateProduct(Product $product){
        try {
            $sql = $this->db->prepare("UPDATE products SET name = :name, description = :description, price = :price, ingredients = :ingredients, nutritionalinformation = :nutritionalinformation, 
                                        brand = :brand, image = :image, weight = :weight, state = :state, idsubcategory = :idsubcategory WHERE id = :id");
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
            throw new BuildExceptions("Error updating product:" . $e->getMessage());
        }
    }
    
    // Delete
    function deleteProduct(int $id): bool {
        $sql = $this->db->prepare("DELETE FROM products WHERE id = :id");
        return $sql->execute([
            ':id' => $id
        ]);
    }
    
    // Search 
    function searchproduct(string $name):array {
        $stmt = $this->db->prepare("SELECT id, SUBSTRING(name, 1, 15) AS name_short, SUBSTRING(description, 1, 12) AS description_short, SUBSTRING(ingredients, 1, 13) AS ingredients_short, 
                                    SUBSTRING(nutritionalinformation, 1, 12) AS nutritionalinformation_short, price, SUBSTRING(brand, 1, 12) AS brand_short, image, weight, state,
                                    idsubcategory FROM products WHERE name LIKE :name");
        $stmt->execute(['name' => '%' . $name . '%']);
        $products = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $result = [];
        foreach($products as $product){
            if (empty($product['nutritionalinformation_short'])) {
                $nutritionalinformation = null;
            } else {
                $nutritionalinformation = $fila['nutritionalinformation_short'];
            }
            $result[] = new Product($product['id'], $product['name_short'], $product['description_short'], $product['ingredients_short'], $$nutritionalinformation, $product['price'], $product['brand_short'], $product['image'], $product['weight'], $product['state'], $product['idsubcategory']);
        }
        return $result;
    }
    
    // Search with state one
    function searchproductstateone(string $name):array {
        $stmt = $this->db->prepare("SELECT id, name, description, SUBSTRING(ingredients, 1, 13) AS ingredients_short, 
                                        SUBSTRING(nutritionalinformation, 1, 20) AS nutritionalinformation_short, price, SUBSTRING(brand, 1, 12) AS brand_short, image, weight, state, idsubcategory FROM products
                                        WHERE name LIKE :name AND state = 1");
        $stmt->execute(['name' => '%' . $name . '%']);
        $productsstateone = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
        $result = [];
        foreach($productsstateone as $product){
            if (empty($product['nutritionalinformation_short'])) {
                $nutritionalinformation = null;
            } else {
                $nutritionalinformation = $product['nutritionalinformation_short'];
            }
            $result[] = new Product($product['id'], $product['name'], $product['description'], $product['ingredients_short'], $nutritionalinformation, $product['price'], $product['brand_short'], $product['image'], $product['weight'], $product['state'], $product['idsubcategory']);        
        }
        return $result;
    }  
}
