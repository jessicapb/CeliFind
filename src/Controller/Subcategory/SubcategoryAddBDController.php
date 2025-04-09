<?php

namespace App\Controller\Subcategory;

use App\Infrastructure\Persistence\CategoryRepository;  

class SubcategoryAddBDController {
    
    private CategoryRepository $category_repository;  

    public function __construct(\PDO $db)
    {
        $this->category_repository = new CategoryRepository($db);
    }

    public function addsubcategory()
    {
        $categories = $this->category_repository->getall();

        echo view('subcategory/addsubcategory', ['categories' => $categories]);
    }
}
