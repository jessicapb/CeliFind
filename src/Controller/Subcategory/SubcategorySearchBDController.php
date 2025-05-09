<?php

namespace App\Controller\Subcategory;

use App\Celifind\Entities\Subcategory;
use App\Celifind\Services\SubcategoryServices;
use App\Celifind\Exceptions\BuildExceptions;
use App\Celifind\Services\CategoryServices;
use App\Celifind\Entities\Category;

class SubcategorySearchBDController
{
    private \PDO $db;
    private SubcategoryServices $subcategoryServices;
    private CategoryServices $categoryServices;

    public function __construct(\PDO $db, SubcategoryServices $subcategoryServices, CategoryServices $categoryServices)
    {
        $this->db = $db;
        $this->subcategoryServices = $subcategoryServices;
        $this->categoryServices = $categoryServices;
    }

    public function searchsubcategory()
    {
        session_start();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'name');
            
            if (empty($name)) {
                $_SESSION['no_results'] = true;
                $_SESSION['search_results'] = []; 
                header('Location: /subcategorysearch'); 
                exit;
            }
            
            try {
                $subcategories = $this->subcategoryServices->searchsubcategory(trim($name));
                $_SESSION['search_results'] = $subcategories;
                $_SESSION['no_results'] = empty($subcategories); 
                header('Location: /subcategorysearch');
                exit;
            } catch (BuildExceptions $e) {
                $_SESSION['error'] = "Error al realizar la búsqueda.";
                header('Location: /subcategory');
                exit;
            }
        }        
    }

    /* We loop through Category and Subcategory to convert it to OBJ */
    public function showsearchresults()
    {
        session_start(); 
        $subcategories_response = [];
        $noResults = false;
        
        if (isset($_SESSION['search_results']) && isset($_SESSION['no_results'])) {
            $subcategories_response = $_SESSION['search_results'];
            $noResults = $_SESSION['no_results'];
            unset($_SESSION['search_results'], $_SESSION['no_results']);
            
            foreach ($subcategories_response as $subcategory) {
                $view_subcategory[] = new Subcategory($subcategory["id"], $subcategory["name"], $subcategory["description"], $subcategory["idcategoria"]);
            }
            $response_cat = $this->categoryServices->showallcategory();
            foreach ($response_cat as $category) {
                $view_category[] = new Category($category["id"], $category["name"], $category["description"], $category["image"]);
            }
        } 
        echo view('subcategory/showsubcategory', ['subcategories' => $view_subcategory, 'categories' => $view_category, 'noResults' => $noResults]);
    }
}