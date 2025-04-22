<?php

namespace App\Controller\Product;

use App\Infrastructure\Persistence\ProductRepository;
use App\Celifind\Entities\Product;

class ProductManagerController {
    private $productRepository;
    
    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }
    
    function productmanager(){
        $products = $this->productRepository->showlimit();
        $allproduct = [];
        foreach($products as $fila){
            $allproducts [] = new Product($fila['id'], $fila['name_short'], $fila['description_short'], $fila['ingredients_short'], $fila['nutritionalinformation_short'], $fila['price'], $fila['brand_short'], $fila['image'], $fila['weight'], $fila['state'], $fila['idsubcategory']);
        }
        echo view('product/productmanager',['products'=>$allproducts]);
    }
}