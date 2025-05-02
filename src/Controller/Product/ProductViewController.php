<?php

namespace App\Controller\Product;

use App\Celifind\Services\ProductServices;
use App\Infrastructure\Persistence\CategoryRepository;
use App\Infrastructure\Persistence\SubcategoryRepository;
use App\Celifind\Entities\Product;

class ProductViewController {
    private $productservices;
    protected CategoryRepository $categoryRepository;
    protected SubcategoryRepository $subcategoryRepository;

    public function __construct(ProductServices $productservices, CategoryRepository $categoryRepository, SubcategoryRepository $subcategoryRepository){
        $this->productservices = $productservices;
        $this->categoryRepository = $categoryRepository;
        $this->subcategoryRepository = $subcategoryRepository;
    }
    
    function productview(){
        $products  = $this->productservices->stateone();
        $categories = $this->categoryRepository->getall();
        $subcategories = $this->subcategoryRepository->getallsub();
        echo view('product/viewproduct',['products'=>$products, 'categories' => $categories, 'subcategories' => $subcategories]);
    }
}