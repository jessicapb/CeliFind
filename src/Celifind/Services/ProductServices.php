<?php

namespace App\Celifind\Services;

use App\Infrastructure\Persistence\ProductRepository;
use App\Celifind\Entities\Product;

class ProductServices{
    private \PDO $db;
    private ProductRepository $ProductRepository;
    
    function __construct(\PDO $db, ProductRepository $ProductRepository){
        $this->db = $db;
        $this->ProductRepository = $ProductRepository;
    }
    
    function exists(string $name):bool{
        return $this->ProductRepository->exists($name);
    }
    
    function existsProduct(string $name, int $id):bool{
        return $this->CategoryRepository->existsProduct($name, $id);
    }
    
    function save(Product $product){
        $product = $this->ProductRepository->save($product);
        return $product;
    }
    
    function showlimit(){
        return $this->ProductRepository->showlimit();
    }
    
    function stateone(){
        return $this->ProductRepository->stateone();
    }
    
    function stateonelimit(){
        return $this->ProductRepository->stateonelimit();
    }
    
    function findById(int $id){
        return $this->ProductRepository->findById($id);
    }
    
    function update(Product $product){
        return $this->ProductRepository->updateProduct($product);
    }
    
    function delete(int $id){
        return $this->ProductRepository->deleteProduct($id);
    }
    
    function searchproduct($name){
        if(empty($name)){
            return $this->ProductRepository->showlimit();
        }
        return $this->ProductRepository->searchproduct($name);
    }
    
    function searchproductstateone($name){
        if(empty($name)){
            return $this->ProductRepository->stateone();
        }
        return $this->ProductRepository->searchproductstateone($name);
    }
    
    function getBySubcategoryId(int $subcategoryId): array { // get all products from that categori
        return $this->ProductRepository->getBySubcategoryId($subcategoryId);
    }
}