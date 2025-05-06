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
        $products = $this->productservices->showlimit();
        $subcategories = $this->subcategoryServices->showallsubcategory();
        echo view('product/productmanager',['products'=>$products,'subcategories' => $subcategories]);
    }
}