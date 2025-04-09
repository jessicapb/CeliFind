<?php

namespace App\Controller\Product;

use App\Infrastructure\Persistence\ProductRepository;
use App\Celifind\Entities\Product;

class ProductDeleteBDController{
    private ProductRepository $productRepository;
    
    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->productRepository = new ProductRepository($db);
    }

    function deleteproduct(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_input(INPUT_POST, 'id');
            if($this->productRepository->deleteProduct($id)){
                header('Location: /productmanager?deleted=true');
                exit();
            }
        }        
    }    
}