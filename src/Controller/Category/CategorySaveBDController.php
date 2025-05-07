<?php

namespace App\Controller\Category;

use App\Celifind\Entities\Category;
use App\Celifind\Exceptions\BuildExceptions;
use App\Celifind\Services\CategoryServices;

class CategorySaveBDController
{
    private \PDO $db;
    private CategoryServices $CategoryServices;

    public function __construct(\PDO $db, CategoryServices $CategoryServices)
    {
        $this->db = $db;
        $this->CategoryServices = $CategoryServices;
    }

    /* Function saveData of categories with images */

    public function savecategory(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Start the session
        session_start();
        $_SESSION['errors'] = [];

        // Assign fields
        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description');

        if (!empty($_FILES['image']['name'])) {
            $folder = '/home/linux/CeliFind/img/categoria/imagesbd/';
            $fileName = $_FILES['image']['name'];
            $destination = $folder . $fileName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                $imageData = '/img/categoria/imagesbd/' . $fileName;
            } else {
                $_SESSION['errors']['image'] = "No s'ha pogut guardar la imatge.";
                header('Location: /categoryadd');
                exit;
            }
        } else {
            $imageData = '';
        }

        try {
            $category = new Category(null, $name, $description, $imageData);
            if ($this->CategoryServices->exists(trim($name))) {
                $_SESSION['errors']['name'] = "El nom ja està registrat.";
                header('Location: /categoryadd');
                exit;
            }
            $this->CategoryServices->save($category);
            header('Location: /category');
        } catch (BuildExceptions $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: /categoryadd');
            exit;
        }
    }
}

}