<?php

namespace App\Controller\Subcategory;

use App\Infrastructure\Persistence\SubcategoryRepository;
use App\Celifind\Services\SubcategoryServices;

class SubcategoryDeleteBDController
{
    private \PDO $db;
    private SubcategoryServices $subcategoryServices;

    public function __construct(\PDO $db, SubcategoryServices $subcategoryServices)
    {
        $this->db = $db;
        $this->subcategoryServices = $subcategoryServices;
    }

    function deletesubcategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id');
            if ($this->subcategoryServices->delete($id)) {
                header('Location: /subcategory?deleted=true');
                exit();
            }
        }
    }
}

?>