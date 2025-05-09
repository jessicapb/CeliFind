<?php

namespace App\Controller\Product;

use App\Celifind\Services\ProductServices;
use App\Celifind\Entities\Product;

class ProductShowImageController {
    private $productservices;
    
    public function __construct(ProductServices $productservices) {
        $this->productservices = $productservices;
    }
    
    function productshowimage(){
        $products = $this->productservices->showlimit();
        echo view('product/productmanagerimage',['products'=>$products]);
    }
}