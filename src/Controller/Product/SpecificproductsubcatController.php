<?php

namespace App\Controller\Product;

use App\Celifind\Services\SubcategoryServices;
use App\Celifind\Services\CategoryServices;
use App\Celifind\Services\ProductServices;

class SpecificproductsubcatController{
    protected SubcategoryServices $subcategoryservices;  
    protected CategoryServices $CategoryService;        
    protected ProductServices $Product;

    // Constructor para inyección de dependencias
    function __construct(SubcategoryServices $subcategoryservices, CategoryServices $categoryService, ProductServices $product) {
        $this->subcategoryservices = $subcategoryservices;
        $this->CategoryService = $categoryService;
        $this->Product = $product;
    }

    function showspecificsubcategoriproduct(){
        session_start();
        
        $subcategoryId = $_POST['subcategory'] ?? null;
        $products = [];
        $noResults = false; 
        
        if (isset($_SESSION['search_results']) && isset($_SESSION['no_results'])) {
            $products = $_SESSION['search_results'];
            $noResults = $_SESSION['no_results'];
        } else {
            if ($subcategoryId) {
                $subcategory = $this->subcategoryservices->findById((int)$subcategoryId);
                
                if ($subcategory) {
                    $products = $this->Product->getBySubcategoryId((int)$subcategoryId);
                    if (empty($products)) {
                        $noResults = true;
                    }
                } else {
                    $noResults = true;
                }
            } else {
                $noResults = true;
            }
            unset($_SESSION['search_results'], $_SESSION['no_results']);
        }
        
        $subcategories = $this->subcategoryservices->showallsubcategory();
        $categories = $this->CategoryService->showallcategory();
        
        echo view('product/viewproduct', [
            'products' => $products,
            'noResults' => $noResults,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }
}
