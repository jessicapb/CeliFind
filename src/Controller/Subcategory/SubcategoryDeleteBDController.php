<?php

namespace App\Controller\Subcategory;

use App\Infrastructure\Persistence\SubcategoryRepository;

class SubcategoryDeleteBDController
{
    private SubcategoryRepository $subcategoryRepository;

    public function __construct(\PDO $db)
    {
        $this->subcategoryRepository = new SubcategoryRepository($db);
    }

    function deletesubcategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id');
            if ($this->subcategoryRepository->deleteSubcategory($id)) {
                header('Location: /subcategory?deleted=true');
                exit();
            }
        }
    }
}

?>