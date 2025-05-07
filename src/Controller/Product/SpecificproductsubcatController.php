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

    //functions

    //function to show specific product
    function showspecificsubcategoriproduct(){

        //we start the session:
        session_start();

        //we check if its null
        $subcategoryId = $_GET['subcategory'] ?? null;
        $products = [];
        $noResults = false;

        if (isset($_SESSION['search_results']) && isset($_SESSION['no_results'])) {
            $products = $_SESSION['search_results'];
            $noResults = $_SESSION['no_results'];
        }else{
            //we check if it exits
            if ($subcategoryId) {
                $products = $this->Product->getBySubcategoryId((int)$subcategoryId);
            } else {
                $products = [];
            }
            unset($_SESSION['search_results'], $_SESSION['no_results']);
        }

        $subcategories = $this->subcategoryservices->showallsubcategory();
        $categories = $this->CategoryService->showallcategory();

        echo view('product/viewproduct', ['products' => $products, 'noResults' => $noResults, 'categories' => $categories, 'subcategories' => $subcategories]);
    }
}