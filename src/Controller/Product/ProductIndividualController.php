<?php

namespace App\Controller\Product;

use App\Celifind\Services\ProductServices;
use App\Celifind\Entities\Product;

class ProductIndividualController{
    private $productservices;
    
    public function __construct(ProductServices $productservices){
        $this->productservices = $productservices;
    }
    
    function productindividual(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_input(INPUT_POST, 'id');
            if($id){
                $product = $this->productservices->findById($id); 
                if ($product) {
                    echo view('product/individualproducts', ['product' => $product]);
                } 
            }
        }
    }
}