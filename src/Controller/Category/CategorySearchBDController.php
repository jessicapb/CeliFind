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
        session_start();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'name');
            
            if (empty($name)) {
                $_SESSION['search_results'] = $this->categoryServices->showallcategory();
                header('Location: /categorysearch'); 
                exit;
            } else {
                try {
                    $categories = $this->categoryServices->searchcategory($name);
                    $_SESSION['search_results'] = $categories;
                    
                    header('Location: /categorysearch');
                    exit;
                } catch (BuildExceptions $e) {
                    $_SESSION['error'] = "Error al realizar la búsqueda.";
                    header('Location: /category');
                    exit;
                }
            }
        }
    }
    

    public function showsearchresults()
    {
        session_start(); 
    
        if (isset($_SESSION['search_results'])) {
            $categories = $_SESSION['search_results'];
            unset($_SESSION['search_results']);  
    
            echo view('category/showcategory', ['categories' => $categories]);
        } else {
            echo view('category/showcategory', ['categories' => []]);
        }
    }
    
}
