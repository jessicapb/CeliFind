<?php

namespace App\Controller\Home;

use App\Celifind\Services\ProductServices;
use App\Celifind\Entities\Product;

class HomeController{
    private $productservices;
    private $subcategoryrepository;
    public function __construct(ProductServices $productservices) {
        $this->productservices = $productservices;
    }
    
    function home(){
        $products = $this->productservices->stateonelimit();
        echo view('home',['products'=>$products]);
    }
}