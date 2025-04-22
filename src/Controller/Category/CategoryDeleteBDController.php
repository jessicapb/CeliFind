<?php

namespace App\Controller\Category;

use App\Infrastructure\Persistence\CategoryRepository;

class CategoryDeleteBDController
{

    private CategoryRepository $categoryRepository;

    public function __construct(\PDO $db)
    {
        $this->categoryRepository = new CategoryRepository($db);
    }

    function deletecategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id');
            if ($this->categoryRepository->deleteCategory($id)) {
                header('Location: /category?deleted=true');
                exit();
            }
        }
        
    }
}
