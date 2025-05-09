<?php

namespace App\Controller\Category;

use App\Celifind\Entities\Category;
use App\Celifind\Services\CategoryServices;
use App\Infrastructure\Persistence\CategoryRepository;

class CategoryShowBDController {

    private \PDO $db;
    private CategoryServices $category_services;

    public function __construct(\PDO $db, CategoryServices $category_services){

        $this->db = $db;
        $this->category_services = $category_services;
    }

    /* Function of view al the categories in the view of showcategory */
    function showcategory(){
        $categories = $this->category_services->showallcategory();
        $view_category = [];
        foreach ($categories as $category){
            $view_category [] = new Category($category["id"], $category["name"],$category["description"],$category["image"]);
        }
        echo view('category/showcategory', ['categories' => $view_category]);
    }
}