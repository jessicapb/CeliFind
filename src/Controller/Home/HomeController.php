<?php

namespace App\Controller\Home;

use App\Celifind\Services\ProductServices;
use App\Celifind\Entities\Product;
use App\Celifind\Services\EstablishmentsServices;

class HomeController{
    private $productservices;
    private $subcategoryrepository;
    private $establishmentservices;

    public function __construct(ProductServices $productservices, EstablishmentsServices $establishmentservices) {
        $this->productservices = $productservices;
        $this->establishmentservices = $establishmentservices;
    }
    
    function home(){
        $products = $this->productservices->stateonelimit();
        $allestablishments = $this->establishmentservices->showlimit();
        echo view('home',['products'=>$products, 'allestablishments'=>$allestablishments]);
    }
}