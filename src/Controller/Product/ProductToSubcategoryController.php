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
        $products = $this->productservices->showlimit();
        $subcategories = $this->subcategoryservices->showallsubcategory();
        echo view('product/producttosubcategory',['products'=>$products,'subcategories' => $subcategories]);
    }
}