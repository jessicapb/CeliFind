<?php

namespace App\Controller\Subcategory;

use App\Infrastructure\Persistence\SubcategoryRepository;
use App\Celifind\Entities\Subcategory;
use App\Celifind\Exceptions\BuildExceptions;

class SubcategorySaveBDController{

    private SubcategoryRepository $SubcategoryRepository;

    public function __construct(\PDO $db)
    {
        $this->SubcategoryRepository = new SubcategoryRepository($db);
    }

    /* Function save data of subcategories */
    public function savesubcategory(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            session_start();
            $_SESSION['errors'] = [];
            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $category_id = filter_input(INPUT_POST, 'idcategoria');

            try {
                $subcategory = new Subcategory(null, $name, $description, $category_id);
                if ($this->SubcategoryRepository->exists($name)) {
                    $_SESSION['errors']['name'] = "El nom ja està registrat.";
                    header('Location: /subcategoryadd');
                    exit;
                }
                $this->SubcategoryRepository->save($subcategory);
                header('Location: /subcategory');
            } catch (BuildExceptions $e) {
                $_SESSION['error'] = $e->getMessage();
                header('Location: /subcategoryadd');
                exit;
            }
        }
    }
}

?>
