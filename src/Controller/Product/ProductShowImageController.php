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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /productview');
            exit;
        }
        
        $products = $this->productservices->showlimit();
        echo view('product/productmanagerimage',['products'=>$products]);
    }
}