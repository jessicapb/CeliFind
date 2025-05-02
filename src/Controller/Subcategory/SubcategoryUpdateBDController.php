<?php

namespace App\Controller\Subcategory;

use App\Infrastructure\Persistence\SubcategoryRepository;
use App\Celifind\Entities\Subcategory;
use App\Celifind\Exceptions\BuildExceptions;

class SubcategoryUpdateBDController{
    private \PDO $db;
    private SubcategoryRepository $SubcategoryRepository;

    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->SubcategoryRepository = new SubcategoryRepository($db);
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

                $this->SubcategoryRepository->updatesubcategory($subcategory);  
                header('Location: /subcategory');
            } catch (BuildExceptions $e) {
                $_SESSION['errors'] = $e->getMessage();
                if ($id) {
                    $subcategory = $this->SubcategoryRepository->findById($id);
                    header('Location: /subcategoryupdate?id=' . urlencode($subcategory));
                }
                dd($id);
                exit;
            }
        }
    }
}