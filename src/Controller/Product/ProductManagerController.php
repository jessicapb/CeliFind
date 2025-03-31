<?php

namespace App\Controller\Product;

use App\Infrastructure\Persistence\ProductRepository;

class ProductManagerController {
    private $productRepository;
    
    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }
    function productmanager(){
        $products = $this->productRepository->showlimit();
        echo view('product/productmanager',['products'=>$products]);
    }
}