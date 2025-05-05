<?php

namespace App\Controller\Category;

use App\Infrastructure\Persistence\CategoryRepository;
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

    public function updatecategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION['errors'] = [];

            $id = filter_input(INPUT_POST, 'id');
            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');

            if (!empty($_FILES['image']['name'])) {
                $folder = '/home/linux/CeliFind/img/categoria/imagesbd/';
                $fileName = $_FILES['image']['name'];
                $destination = $folder . $fileName;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                    $imageData = '/img/categoria/imagesbd/' . $fileName;
                } else {
                    $_SESSION['error'] = 'Error al subir la imagen.';
                    header('Location: /categoryupdate?id=' . urlencode($id));
                    exit;
                }
            } else {
                $imageData = '';
            }    
            try {
                $category = new Category($id, $name, $description, $imageData);

                $this->category_services->update($category);  
                header('Location: /category');
            } catch (BuildExceptions $e) {
                $_SESSION['error'] = $e->getMessage();
                header('Location: /categoryupdate?id=' . urlencode($id));
                exit;
            }
        }
    }
}
