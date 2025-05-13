<?php

namespace App\Controller\Category;
use App\Celifind\Services\CategoryServices;

class CategoryUpdateController{
    private \PDO $db;
    private CategoryServices $category_services;
    
    public function __construct(\PDO $db, CategoryServices $category_services) {
        $this->db = $db;
        $this->category_services = $category_services;
    }
    
    public function categoryupdate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start(); 
            $id = filter_input(INPUT_POST, 'id');
            
            if ($id) {
                $fila = $this->category_services->findById($id);
                
                $errors = $_SESSION['errors'] ?? [];
                unset($_SESSION['errors']);
                
                $formData = $_SESSION['formData'] ?? null;
                unset($_SESSION['formData']);
                
                if (!$formData && $fila) {
                    $formData = [
                        'id' => $fila->id,
                        'name' => $fila->name,
                        'description' => $fila->description,
                        'image' => $fila->image,
                    ];
                }
                
                echo view('category/categoryupdate', [
                    'formData' => $formData,
                    'errors' => $errors,
                ]);
            }
        }
    }

    
}