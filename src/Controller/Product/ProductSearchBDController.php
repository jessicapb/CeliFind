<?php

namespace App\Controller\Product;

use App\Infrastructure\Persistence\ProductRepository;
use App\Celifind\Exceptions\BuildExceptions;

class ProductSearchBDController{
    private \PDO $db;
    private ProductRepository $ProductRepository;

    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->ProductRepository = new ProductRepository($db);
    }

    public function searchproduct(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = filter_input(INPUT_POST,'name');
            try {
                $this->ProductRepository->searchproduct($name);
                header('Location: /productsearch');
            } catch (BuildExceptions $e) {
                header('Location: /productmanager');
                exit;
            }
        }
    }
}
//name