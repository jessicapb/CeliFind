<?php

namespace App\Controller\Category;

use App\Celifind\Services\CategoryServices;
use App\Infrastructure\Persistence\CategoryRepository;

class CategoryDeleteBDController
{
    private \PDO $db;
    private CategoryServices $categoryServices;

    public function __construct(\PDO $db, CategoryServices $categoryServices)
    {
        $this->db = $db;
        $this->categoryServices = $categoryServices;
    }

    function deletecategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id');
            if ($this->categoryServices->delete($id)) {
                header('Location: /category?deleted=true');
                exit();
            }
        }
        
    }
}
