<?php
namespace App\Controller\Product;

use App\Celifind\Services\ProductServices;
use App\Celifind\Services\CategoryServices;
use App\Celifind\Services\SubcategoryServices; 
use App\Celifind\Exceptions\BuildExceptions;

class ProductSearchStateOneBDController {
    private \PDO $db;
    private ProductServices $productServices; 
    private SubcategoryServices $subcategoryServices; 
    private CategoryServices $categoryservices;
    
    public function __construct(\PDO $db, ProductServices $productServices, CategoryServices $categoryservices, SubcategoryServices $subcategoryServices) {
        $this->db = $db;
        $this->productServices = $productServices; 
        $this->categoryservices = $categoryservices;
        $this->subcategoryServices = $subcategoryServices;  
    }
    
    public function searchproductstateone() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'name');
            
            if (empty($name)) {
                $_SESSION['no_results'] = true;
                $_SESSION['search_results'] = [];
                header('Location: /showsearchresultsproductone');
                exit;
            }
            
            try {
                $productsstateone = $this->productServices->searchproductstateone($name);
                $_SESSION['search_results'] = $productsstateone;
                $_SESSION['no_results'] = empty($productsstateone); 
                
                header('Location: /showsearchresultsproductone');
                exit;
            } catch (BuildExceptions $e) {
                $_SESSION['error'] = "Error al realitzar la cerca.";
                header('Location: /productview');
                exit;
            }
        }
    }
    
    public function showsearchresultsproductone() {
        session_start();
        
        $products = [];
        $noResults = false;
        
        if (isset($_SESSION['search_results']) && isset($_SESSION['no_results'])) {
            $products = $_SESSION['search_results'];
            $noResults = $_SESSION['no_results'];
        }
        unset($_SESSION['search_results'], $_SESSION['no_results']);
        
        $categories = $this->categoryservices->showallcategory();
        $subcategories = $this->subcategoryServices->showallsubcategory();
        
        echo view('product/viewproduct', ['products' => $products, 'noResults' => $noResults, 'categories' => $categories, 'subcategories' => $subcategories]);
    }
}
