<?php

namespace App\Controller\Product;

use App\Celifind\Services\ProductServices;
use App\Celifind\Services\SubcategoryServices;
use App\Celifind\Entities\Product;

class ProductToSubcategoryController {
    private $productservices;
    private $subcategoryservices;
    public function __construct(ProductServices $productservices, SubcategoryServices $subcategoryservices ) {
        $this->productservices = $productservices;
        $this->subcategoryservices = $subcategoryservices;
    }
    
    function producttocategory(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /productview');
            exit;
        }
        
        $products = $this->productservices->showlimit();
        $subcategories = $this->subcategoryservices->showallsubcategory();
        echo view('product/producttosubcategory',['products'=>$products,'subcategories' => $subcategories]);
    }
}