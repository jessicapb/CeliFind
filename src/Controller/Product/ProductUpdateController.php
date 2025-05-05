<?php

namespace App\Controller\Product;

use App\Infrastructure\Persistence\ProductRepository;
use App\Celifind\Entities\Product;

class ProductUpdateController{
    private $productRepository;
    
    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->productRepository = new ProductRepository($db);
    }
    
    function productupdates(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id');
            if ($id) {
                
                $fila = $this->productRepository->findById($id);
                if ($fila) {
                    $product = new Product(
                        $fila->getId(),
                        $fila->getName(),
                        $fila->getDescription(),
                        $fila->getIngredients(),
                        $fila->getNutritionalInformation(),
                        $fila->getPrice(),
                        $fila->getBrand(),
                        $fila->getImage(),
                        $fila->getWeight(),
                        $fila->getState(),
                        $fila->getSubcategoryId()
                    );
                    echo view('product/productupdate', ['product' => $product]);
                }
            }
        }
    }
}