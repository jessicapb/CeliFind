<?php

namespace App\Controller\Subcategory;

use App\Celifind\Entities\Subcategory;
use App\Infrastructure\Persistence\SubcategoryRepository;
use App\Infrastructure\Persistence\CategoryRepository;
use App\Celifind\Entities\Category;

class SubcategoryShowBDController
{

    private SubcategoryRepository $subcategory_repository;
    private CategoryRepository $category_repository;

    public function __construct(\PDO $db)
    {
        $this->subcategory_repository = new SubcategoryRepository($db);
        $this->category_repository = new CategoryRepository($db);

    }

    /* Function of view al the subcategories in the view of showsubcategory */
    function showsubcategory()
    {
        $subcategories = $this->subcategory_repository->getallsub();
        $categories = $this->category_repository->getall();

        $view_subcategory = [];
        $view_category = [];

        foreach ($subcategories as $subcategory) {
            $view_subcategory[] = new Subcategory($subcategory["id"], $subcategory["name"], $subcategory["description"], $subcategory["idcategoria"]);
        }
        foreach ($categories as $category){
            $view_category [] = new Category($category["id"], $category["name"],$category["description"],$category["image"]);
        }

        echo view('subcategory/showsubcategory', ['subcategories' => $view_subcategory, 'categories' => $view_category]);
    }
}
