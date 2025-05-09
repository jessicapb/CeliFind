<?php

namespace App\Controller\Product;

use App\Celifind\Services\ProductServices;
use App\Celifind\Services\SubcategoryServices;
use App\Celifind\Services\CategoryServices;
use App\Celifind\Entities\Product;

class ProductViewController {
    private $productservices;
    private $categoryservices;
    private $subcategoryservices;
    
    public function __construct(ProductServices $productservices, CategoryServices $categoryservices, SubcategoryServices $subcategoryservices){
        $this->productservices = $productservices;
        $this->categoryservices = $categoryservices;
        $this->subcategoryservices = $subcategoryservices;
    }
    
    function productview(){
        $products  = $this->productservices->stateone();
        $categories = $this->categoryservices->showallcategory();
        $subcategories = $this->subcategoryservices->showallsubcategory();
        echo view('product/viewproduct',['products'=>$products, 'categories' => $categories, 'subcategories' => $subcategories]);
    }
}