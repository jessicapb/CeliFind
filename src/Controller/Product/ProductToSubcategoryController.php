<?php

namespace App\Controller\Product;

use App\Infrastructure\Persistence\ProductRepository;

class ProductToSubcategoryController {
    private $productRepository;
    
    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }
    
    function producttocategory(){
        $products = $this->productRepository->showlimit();
        echo view('product/producttosubcategory',['products'=>$products]);
    }
}