<?php

namespace App\Controller\Subcategory;

use App\Celifind\Entities\Subcategory;
use App\Celifind\Services\CategoryServices;
use App\Celifind\Services\SubcategoryServices;

class SubcategoryUpdateController 
{
    private SubcategoryServices $subcategory_services;
    private CategoryServices $category_services;

    public function __construct(SubcategoryServices $subcategory_services, CategoryServices $category_services) {
        $this->subcategory_services = $subcategory_services;
        $this->category_services = $category_services;
    }

    public function subcategoryupdate() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            session_start(); 
            $id = filter_input(INPUT_GET, 'id');
    
            if ($id) {
                $fila = $this->subcategory_services->findById($id);

                if ($fila) {
                    $subcategory = new Subcategory(
                        $fila->id, 
                        $fila->name, 
                        $fila->description, 
                        $fila->idcategoria
                    );

                    $categories = $this->category_services->showallcategory();

                    echo view('subcategory/subcategoryupdate', [
                        'subcategory' => $subcategory,
                        'categories' => $categories, 
                    ]);
                }
            }
        }
    }
}
