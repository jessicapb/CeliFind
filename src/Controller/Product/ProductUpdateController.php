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
    
    function productupdate(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id');
            if ($id) {
                $fila = $this->productRepository->findById($id);
                if ($fila) {
                    $product = new Product($fila->id, $fila->name, $fila->description, $fila->ingredients, $fila->nutritionalinformation, $fila->price, $fila->brand, $fila->image, $fila->weight,
                                            $fila->state, $fila->idsubcategory);
                    echo view('product/productupdate', ['product' => $product]);
                }
            }
        }
    }
}