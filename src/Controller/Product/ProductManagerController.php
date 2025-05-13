<?php

namespace App\Controller\Product;

use App\Celifind\Services\ProductServices;
use App\Celifind\Services\SubcategoryServices;
use App\Celifind\Entities\Product;

class ProductManagerController {
    private $productservices;
    private $subcategoryServices;
    
    public function __construct(ProductServices $productservices, SubcategoryServices $subcategoryServices) {
        $this->productservices = $productservices;
        $this->subcategoryServices = $subcategoryServices;
    }
    
    function productmanager(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /productview');
            exit;
        }
        
        $products = $this->productservices->showlimit();
        $subcategories = $this->subcategoryServices->showallsubcategory();
        echo view('product/productmanager',['products'=>$products,'subcategories' => $subcategories]);
    }
}