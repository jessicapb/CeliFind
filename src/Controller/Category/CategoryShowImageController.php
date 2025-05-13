<?php

namespace App\Controller\Category;

use App\Infrastructure\Persistence\CategoryRepository;
use App\Celifind\Entities\Category;
use App\Celifind\Services\CategoryServices;

class CategoryShowImageController {
    private CategoryServices $category_services;
    
    public function __construct(CategoryServices $category_services) {
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
        $categories = $this->category_services->showlimit();
        echo view('category/categorymanagerimage', ['categories' => $categories]);
    }
}