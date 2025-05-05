<?php

namespace App\Controller\Subcategory;

use App\Celifind\Entities\Subcategory;
use App\Celifind\Exceptions\BuildExceptions;
use App\Celifind\Services\SubcategoryServices;

class SubcategoryUpdateBDController{
    private \PDO $db;
    private SubcategoryServices $subcategory_services;
    
    public function __construct(\PDO $db, SubcategoryServices $subcategory_services) {
        $this->db = $db;
        $this->subcategory_services = $subcategory_services;
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

                $this->subcategory_services->update($subcategory);  
                header('Location: /subcategory');
            } catch (BuildExceptions $e) {
                $_SESSION['errors'] = $e->getMessage();
                if ($id) {
                    $subcategory = $this->subcategory_services->findById($id);
                    header('Location: /subcategoryupdate?id=' . urlencode($subcategory->getId()));
                }
                else {
                    header('Location: /subcategory');
                }
            }
        }
    }
}
