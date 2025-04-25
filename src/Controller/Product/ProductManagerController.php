<?php

namespace App\Controller\Product;

use App\Celifind\Services\ProductServices;
use App\Infrastructure\Persistence\SubcategoryRepository;
use App\Celifind\Entities\Product;

class ProductManagerController {
    private $productservices;
    private $subcategoryrepository;
    public function __construct(ProductServices $productservices, SubcategoryRepository $subcategoryrepository ) {
        $this->productservices = $productservices;
        $this->subcategoryrepository = $subcategoryrepository;
    }
    
    function productmanager(){
        $products = $this->productservices->showlimit();
        $subcategories = $this->subcategoryrepository->getallsub();
        echo view('product/productmanager',['products'=>$products,'subcategories' => $subcategories]);
    }
}