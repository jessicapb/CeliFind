<?php

namespace App\Controller\Product;

use App\Celifind\Services\ProductServices;
use App\Celifind\Entities\Product;

class ProductViewController {
    private $productservices;
    
    public function __construct(ProductServices $productservices){
        $this->productservices = $productservices;
    }
    
    function productview(){
        $products  = $this->productservices->stateone();
        echo view('product/viewproduct',['products'=>$products]);
    }
}