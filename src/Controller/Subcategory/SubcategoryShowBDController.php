<?php

namespace App\Controller\Subcategory;

use App\Celifind\Entities\Subcategory;
use App\Infrastructure\Persistence\SubcategoryRepository;
use App\Infrastructure\Persistence\CategoryRepository;
use App\Celifind\Entities\Category;
use App\Celifind\Services\CategoryServices;
use App\Celifind\Services\SubcategoryServices;

class SubcategoryShowBDController
{
    private \PDO $db;
    private CategoryServices $category_services;
    private SubcategoryServices $subcategory_services;

    public function __construct(\PDO $db, SubcategoryServices $subcategory_services, CategoryServices $category_services)
    {
        $this->db = $db;
        $this->subcategory_services = $subcategory_services;
        $this->category_services = $category_services;
    }

    /* Function of view all the subcategories in the view of showsubcategory */
    function showsubcategory()
    {
        $subcategories = $this->subcategory_services->showallsubcategory();
        $categories = $this->category_services->showallcategory();
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
