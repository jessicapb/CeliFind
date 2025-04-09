<?php

namespace App\Controller\Category;

use App\Celifind\Entities\Category;
use App\Infrastructure\Persistence\CategoryRepository;

class CategoryShowBDController {

    private CategoryRepository $category_repository;

    public function __construct(\PDO $db){
        $this->category_repository = new CategoryRepository($db);
    }

    /* Function of view al the categories in the view of showcategory */
    function showcategory(){
        $categories = $this->category_repository->getall();
        $view_category = [];
        foreach ($categories as $category){
            $view_category [] = new Category($category["id"], $category["name"],$category["description"],$category["image"]);
        }
        echo view('category/showcategory', ['categories' => $view_category]);
    }
}