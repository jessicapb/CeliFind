<?php

namespace App\Controller\Category;

use App\Infrastructure\Persistence\CategoryRepository;
use App\Celifind\Entities\Category;

class CategoryShowImageBDController{
    private CategoryRepository $CategoryRepository;
    
    public function __construct(\PDO $db)
    {
        $this->CategoryRepository = new CategoryRepository($db);
    }
    
    function categoryshowimage(){
        $categories = $this->CategoryRepository->getall();
        $view_category = [];
        foreach ($categories as $category){
            $view_category [] = new Category($category["id"], $category["name"],$category["description"],$category["image"]);
        }
        echo view('category/categorymanagerimage', ['categories' => $view_category]);
    }
}
