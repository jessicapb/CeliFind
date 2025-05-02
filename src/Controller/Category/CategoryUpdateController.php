<?php

namespace App\Controller\Category;
use App\Infrastructure\Persistence\CategoryRepository;
use App\Celifind\Entities\Category;

class CategoryUpdateController{
    private \PDO $db;
    private CategoryRepository $CategoryRepository;

    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->CategoryRepository = new CategoryRepository($db);
    }

    public function categoryupdate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start(); 
            $id = filter_input(INPUT_GET, 'id');
    
            if ($id) {
                $fila = $this->CategoryRepository->findById($id);
                if ($fila) {
                    $category = new Category($fila->id, $fila->name, $fila->description, $fila->image);
                    echo view('category/categoryupdate', [
                        'category' => $category,
                    ]);
                }
            }
        }
    }
    
}