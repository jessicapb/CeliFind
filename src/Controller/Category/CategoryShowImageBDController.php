<?php

namespace App\Controller\Category;

use App\Infrastructure\Persistence\CategoryRepository;
use App\Celifind\Entities\Category;
use App\Celifind\Services\CategoryServices;

class CategoryShowImageBDController{
    private \PDO $db;
    private CategoryServices $category_services;
    
    public function __construct(\PDO $db, CategoryServices $category_services)
    {   
        $this->db = $db;
        $this->category_services = $category_services;
    }
    
    function categoryshowimage(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /productview');
            exit;
        }
        
        $categories = $this->category_services->showallcategory();
        $view_category = [];
        foreach ($categories as $category){
            $view_category [] = new Category($category["id"], $category["name"],$category["description"],$category["image"]);
        }
        echo view('category/categorymanagerimage', ['categories' => $view_category]);
    }
}
