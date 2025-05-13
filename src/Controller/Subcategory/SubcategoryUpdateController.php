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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /productview');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start(); 
            $id = filter_input(INPUT_POST, 'id');
            
            if ($id) {
                $fila = $this->subcategory_services->findById($id);
                
                $errors = $_SESSION['errors'] ?? [];
                unset($_SESSION['errors']);
                
                $formData = $_SESSION['formData'] ?? null;
                unset($_SESSION['formData']);
                
                if (!$formData && $fila) {
                    $formData = [
                        'id' => $fila->id,
                        'name' => $fila->name,
                        'description' => $fila->description,
                        'idcategoria' => $fila->idcategoria,
                    ];
                    
                    $categories = $this->category_services->showallcategory();
                    
                    echo view('subcategory/subcategoryupdate', [
                        'formData' => $formData,
                        'categories' => $categories, 
                        'errors' => $errors,
                    ]);
                }
            }
        }
    }
}