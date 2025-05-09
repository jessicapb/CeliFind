<?php

namespace App\Controller\Subcategory;

use App\Celifind\Services\CategoryServices;
use App\Celifind\Services\SubcategoryServices;
use App\Infrastructure\Persistence\CategoryRepository;  

class SubcategoryAddBDController {

    private \PDO $db;
    private CategoryServices $category_services;

    public function __construct(\PDO $db, CategoryServices $category_services)
    {
        $this->db = $db;
        $this->category_services = $category_services;
    }

    public function addsubcategory()
    {
        $categories = $this->category_services->showallcategory();
        echo view('subcategory/addsubcategory', ['categories' => $categories]);
    }
}
