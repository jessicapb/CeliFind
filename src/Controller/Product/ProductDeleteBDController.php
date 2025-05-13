<?php

namespace App\Controller\Product;

use App\Infrastructure\Persistence\ProductRepository;
use App\Celifind\Services\ProductServices;
use App\Celifind\Entities\Product;

class ProductDeleteBDController{
    private ProductRepository $productRepository;
    private ProductServices $productServices;
    
    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->productRepository = new ProductRepository($db);
        $this->productServices = new ProductServices($db, $this->productRepository);
    }
    
    function deleteproduct(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /productview');
            exit;
        }
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_input(INPUT_POST, 'id');
            if($this->productServices->delete($id)){
                header('Location: /productmanager?deleted=true');
                exit();
            }
        }        
    }    
}