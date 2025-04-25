<?php

namespace App\Controller\Product;

use App\Celifind\Services\ProductServices;
use App\Infrastructure\Persistence\SubcategoryRepository;
use App\Celifind\Entities\Product;

class ProductToSubcategoryController {
    private $productservices;
    private $subcategoryrepository;
    public function __construct(ProductServices $productservices, SubcategoryRepository $subcategoryrepository ) {
        $this->productservices = $productservices;
        $this->subcategoryrepository = $subcategoryrepository;
    }
    
    function producttocategory(){
        $products = $this->productservices->showlimit();
        $subcategories = $this->subcategoryrepository->getallsub();
        echo view('product/producttosubcategory',['products'=>$products,'subcategories' => $subcategories]);
    }
}