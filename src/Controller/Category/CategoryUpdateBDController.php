<?php

namespace App\Controller\Category;

use App\Celifind\Entities\Category;
use App\Celifind\Exceptions\BuildExceptions;
use App\Celifind\Services\CategoryServices;

class CategoryUpdateBDController{
    private \PDO $db;
    private CategoryServices $category_services;
    
    public function __construct(\PDO $db, CategoryServices $category_services) {
        $this->db = $db;
        $this->category_services = $category_services;
    }
    
    // Private function to render the form with errors
    private function FormWithErrors($id) {
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
    
    public function updatecategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION['errors'] = [];
    
            $id = filter_input(INPUT_POST, 'id');
            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
    
            $_SESSION['formData'] = [
                'id' => $id,
                'name' => $name,
                'description' => $description,
            ];
    
            if (!empty($_FILES['image']['name'])) {
                $folder = '/home/linux/CeliFind/img/categoria/imagesbd/';
                $fileName = $_FILES['image']['name'];
                $destination = $folder . $fileName;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                    $imageData = '/img/categoria/imagesbd/' . $fileName;
                } else {
                    $_SESSION['errors']['image'] = 'Error al subir la imagen';
                    $this->FormWithErrors($id);
                    return;
                }
            } else {
                $imageData = '';
            }
    
            try {
                $category = new Category($id, $name, $description, $imageData);
                if ($this->category_services->existsCategory($name, $id)) {
                    $_SESSION['errors']['name'] = 'El nom ja està registrat';
                    $this->FormWithErrors($id);
                    return;
                }
    
                $this->category_services->update($category);
                header('Location: /category');
                exit;
            } catch (BuildExceptions $e) {
                $_SESSION['errors']['general'] = $e->getMessage();
                $this->FormWithErrors($id);
                return;
            }
        }
    }
    
}