<?php

namespace App\Controller\Category;

use App\Infrastructure\Persistence\CategoryRepository;
use App\Celifind\Entities\Category;
use App\Celifind\Exceptions\BuildExceptions;

class CategorySaveBDController
{
    private CategoryRepository $CategoryRepository;

    public function __construct(\PDO $db)
    {
        $this->CategoryRepository = new CategoryRepository($db);
    }

    /* Function saveData of categories with images */

    public function savecategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION['errors'] = [];
            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageData = file_get_contents($_FILES['image']['tmp_name']);
            } else {
                $imageData = null;
            }
            try {
                $category = new Category(null, $name, $description, $imageData);
                if ($this->CategoryRepository->exists($name)) {
                    $_SESSION['errors']['name'] = "El nom ja està registrat.";
                    header('Location: /categoryadd');
                    exit;
                }
                $this->CategoryRepository->save($category);
                header('Location: /category');
            } catch (BuildExceptions $e) {
                $_SESSION['error'] = $e->getMessage();
                header('Location: /categoryadd');
                exit;
            }
        }
    }
}
