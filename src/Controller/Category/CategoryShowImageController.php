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
    $categories = $this->category_services->showlimit();
    echo view('category/categorymanagerimage', ['categories' => $categories]);
    }
}