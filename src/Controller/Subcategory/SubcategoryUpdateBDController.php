<?php

namespace App\Controller\Subcategory;

use App\Celifind\Entities\Subcategory;
use App\Celifind\Exceptions\BuildExceptions;
use App\Celifind\Services\CategoryServices;
use App\Celifind\Services\SubcategoryServices;

class SubcategoryUpdateBDController{
    private \PDO $db;
    private SubcategoryServices $subcategory_services;
    private CategoryServices $category_services;
    
    public function __construct(\PDO $db, SubcategoryServices $subcategory_services, CategoryServices $category_services) {
        $this->db = $db;
        $this->subcategory_services = $subcategory_services;
        $this->category_services = $category_services;
    }
    
    private function FormWithErrorsSubcategory($id) {
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

    public function updatesubcategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION['errors'] = [];

            $id = filter_input(INPUT_POST, 'id');
            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $idcategoria = filter_input(INPUT_POST, 'idcategoria');
            
            try {
                $subcategory = new Subcategory($id, $name, $description, $idcategoria);
                if ($this->subcategory_services->existsSubcategory($name, $id)) {
                    $_SESSION['errors']['name'] = 'El nom ja està registrat';
                    $this->FormWithErrorsSubcategory($id);                    
                    return;
                }
                $this->subcategory_services->update($subcategory);  
                header('Location: /subcategory');
            } catch (BuildExceptions $e) {
                $_SESSION['errors']['general'] = $e->getMessage();
                $this->FormWithErrorsSubcategory($id);                    
                exit;
            }
        }
    }
}