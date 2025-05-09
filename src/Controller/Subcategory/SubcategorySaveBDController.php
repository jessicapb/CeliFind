<?php

namespace App\Controller\Subcategory;

use App\Infrastructure\Persistence\SubcategoryRepository;
use App\Celifind\Entities\Subcategory;
use App\Celifind\Exceptions\BuildExceptions;
use App\Celifind\Services\SubcategoryServices;

class SubcategorySaveBDController{
    private \PDO $db;
    private SubcategoryServices $SubcategoryServices;
    
    public function __construct(\PDO $db, SubcategoryServices $SubcategoryServices)
    {
        $this->db = $db;
        $this->SubcategoryServices = $SubcategoryServices;
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
                if ($this->SubcategoryServices->exists(trim($name))) {
                    $_SESSION['errors']['name'] = "El nom ja està registrat.";
                    header('Location: /addsubcategory');
                    exit;
                }
                $this->SubcategoryServices->save($subcategory);
                header('Location: /subcategory');
            } catch (BuildExceptions $e) {
                $_SESSION['error'] = $e->getMessage();
                header('Location: /addsubcategory');
                exit;
            }
        }
    }
}
?>