<?php

namespace App\Controller\Product;

use App\Celifind\Services\SubcategoryServices;
use App\Celifind\Services\CategoryServices;
use App\Celifind\Services\ProductServices;

class SpecificproductsubcatController{
    protected SubcategoryServices $subcategoryservices;//call categories
    protected CategoryServices $CategoryService;//call subcategories
    protected ProductServices $Product;//call Products

    //contructor function
    function __construct(SubcategoryServices $subcategoryservices, CategoryServices $categoryService, ProductServices $product) {
        //variable assigamente
        $this->subcategoryservices = $subcategoryservices;
        $this->CategoryService = $categoryService;
        $this->Product = $product;
    }

    //function to show specific product
    function showspecificsubcategoriproduct(){
        //we start the session:
        session_start();
        
        $subcategoryId = $_POST['subcategory'] ?? null;
        $products = [];
        $noResults = false; 
        
        //we check if its null
        if (isset($_SESSION['search_results']) && isset($_SESSION['no_results'])) {
            $products = $_SESSION['search_results'];
            $noResults = $_SESSION['no_results'];
        //we check if it exits
        } else {
            if ($subcategoryId) {
                $products = $this->Product->getBySubcategoryId((int)$subcategoryId);
                if (empty($products)) {
                    $noResults = true;
                }
            } else {
                $products = [];
                $noResults = true;
            }
            unset($_SESSION['search_results'], $_SESSION['no_results']);
        }
        
        $subcategories = $this->subcategoryservices->showallsubcategory();
        $categories = $this->CategoryService->showallcategory();
        
        echo view('product/viewproduct', ['products' => $products, 'noResults' => $noResults, 'categories' => $categories, 'subcategories' => $subcategories]);
    }
}