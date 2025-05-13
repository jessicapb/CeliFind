<?php

namespace App\Controller\Category;

use App\Celifind\Services\CategoryServices;
use App\Celifind\Exceptions\BuildExceptions;

class CategorySearchBDController
{
    private \PDO $db;
    private CategoryServices $categoryServices;
    
    public function __construct(\PDO $db, CategoryServices $categoryServices)
    {
        $this->db = $db;
        $this->categoryServices = $categoryServices;
    }
    
    public function searchcategory()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /productview');
            exit;
        }
        
        session_start();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'name');
            
            if (empty($name)) {
                $_SESSION['no_results'] = true;
                $_SESSION['search_results'] = []; 
                header('Location: /categorysearch');
                exit;
            } 
            
            try {
                $categories = $this->categoryServices->searchcategory(trim($name));
                $_SESSION['search_results'] = $categories;
                $_SESSION['no_results'] = empty($categories); 
                header('Location: /categorysearch');
                exit;
            } catch (BuildExceptions $e) {
                    $_SESSION['error'] = "Error al realizar la búsqueda.";
                    header('Location: /category');
                    exit;
            }
        }
    }
    
    public function showsearchresults()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /productview');
            exit;
        }
        
        $categories = [];
        $noResults = false;
        
        if (isset($_SESSION['search_results']) && isset($_SESSION['no_results'])) {
            $categories = $_SESSION['search_results'];
            $noResults = $_SESSION['no_results'];
            unset($_SESSION['search_results'], $_SESSION['no_results']);
        }
        
        echo view('category/showcategory', ['categories' => $categories, 'noResults' => $noResults]);
    }
    
}