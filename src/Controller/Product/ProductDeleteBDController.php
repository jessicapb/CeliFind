<?php

namespace App\Controller\Product;

use App\Infrastructure\Persistence\ProductRepository;
use App\Celifind\Entities\Product;

class ProductDeleteBDController{
    private $productRepository;
    
    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->ProductRepository = new ProductRepository($db);
    }

    function deleteproduct(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_input(INPUT_POST, 'id');
            if($this->ProductRepository->deleteProduct($id)){
                header('Location: /productmanager?deleted=true');
                exit();
            }
        }        
    }    
}