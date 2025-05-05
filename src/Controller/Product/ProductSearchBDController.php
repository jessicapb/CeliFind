<?php
namespace App\Controller\Product;

use App\Celifind\Services\ProductServices;
use App\Celifind\Services\SubcategoryServices; 
use App\Celifind\Exceptions\BuildExceptions;

class ProductSearchBDController {
    private \PDO $db;
    private ProductServices $productServices;
    private SubcategoryServices $subcategoryServices; 
    
    public function __construct(\PDO $db, ProductServices $productServices, SubcategoryServices $subcategoryServices) {
        $this->db = $db;
        $this->productServices = $productServices;
        $this->subcategoryServices = $subcategoryServices;  
    }
    
    public function searchproduct() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'name');
            
            try {
                $products = $this->productServices->searchproduct($name);
                $_SESSION['search_results'] = $products;
                $_SESSION['no_results'] = empty($products); 
                
                header('Location: /showsearchresults');
                exit;
            } catch (BuildExceptions $e) {
                $_SESSION['error'] = "Error al realitzar la cerca.";
                header('Location: /productmanager');
                exit;
            }
        }
    }
    
    public function showsearchresults() {
        session_start();
        
        $products = [];
        $noResults = false;
        
        if (isset($_SESSION['search_results']) && isset($_SESSION['no_results'])) {
            $products = $_SESSION['search_results'];
            $noResults = $_SESSION['no_results'];
        }
        unset($_SESSION['search_results'], $_SESSION['no_results']);
        
        $subcategories = $this->subcategoryServices->showallsubcategory(); 
        
        echo view('product/productmanager', ['products' => $products, 'noResults' => $noResults, 'subcategories' => $subcategories]);
    }
}
