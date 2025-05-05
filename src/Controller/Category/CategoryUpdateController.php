<?php

namespace App\Controller\Category;
use App\Infrastructure\Persistence\CategoryRepository;
use App\Celifind\Entities\Category;
use App\Celifind\Services\CategoryServices;

class CategoryUpdateController{
    private \PDO $db;
    private CategoryServices $category_services;

    public function __construct(\PDO $db, CategoryServices $category_services) {
        $this->db = $db;
        $this->category_services = $category_services;
    }

    public function categoryupdate() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            session_start(); 
            $id = filter_input(INPUT_GET, 'id');
    
            if ($id) {
                $fila = $this->category_services->findById($id);
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