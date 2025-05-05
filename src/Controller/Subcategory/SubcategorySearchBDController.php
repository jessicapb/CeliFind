<?php

namespace App\Controller\Subcategory;
use App\Celifind\Services\SubcategoryServices;
use App\Celifind\Exceptions\BuildExceptions;

class SubcategorySearchBDController{

    private \PDO $db;
    private SubcategoryServices $subcategoryServices;

    public function __construct(\PDO $db, SubcategoryServices $subcategoryServices)
    {
        $this->db = $db;
        $this->subcategoryServices = $subcategoryServices;
    }

    public function searchsubcategory()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'name');
        
            if (empty($name)) {
                $_SESSION['search_results'] = $this->subcategoryServices->showallsubcategory();
                header('Location: /subcategorysearch'); 
                exit;
            } else {
                try {
                    $subcategories = $this->subcategoryServices->searchsubcategory($name);
                    $_SESSION['search_results'] = $subcategories;
                    header('Location: /subcategorysearch');
                    exit;
                } catch (BuildExceptions $e) {
                    $_SESSION['error'] = "Error al realizar la búsqueda.";
                    header('Location: /subcategory');
                    exit;
                }
            }
        }        
    }

    public function showsearchresults()
    {
        session_start(); 

        if (isset($_SESSION['search_results'])) {
            $subcategories = $_SESSION['search_results'];
            unset($_SESSION['search_results']);  

            echo view('subcategory/showsubcategory', ['subcategories' => $subcategories]);
        } else {
            echo view('subcategory/showsubcategory', ['subcategories' => []]);
        }
    }
}