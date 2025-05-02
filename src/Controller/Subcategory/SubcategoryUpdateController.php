<?php

namespace App\Controller\Subcategory;

use App\Infrastructure\Persistence\SubcategoryRepository;
use App\Infrastructure\Persistence\CategoryRepository; 
use App\Celifind\Entities\Subcategory;

class SubcategoryUpdateController {
    private \PDO $db;
    private SubcategoryRepository $SubcategoryRepository;
    private CategoryRepository $CategoryRepository; 

    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->SubcategoryRepository = new SubcategoryRepository($db);
        $this->CategoryRepository = new CategoryRepository($db); 
    }

    public function subcategoryupdate() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            session_start(); 
            $id = filter_input(INPUT_GET, 'id');
    
            if ($id) {
                $fila = $this->SubcategoryRepository->findById($id);
                if ($fila) {
                    $subcategory = new Subcategory($fila->id, $fila->name, $fila->description, $fila->idcategoria);

                    $categories = $this->CategoryRepository->getall();

                    echo view('subcategory/subcategoryupdate', [
                        'subcategory' => $subcategory,
                        'categories' => $categories, 
                    ]);
                }
            }
        }
    }
}
