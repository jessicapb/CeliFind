<?php

namespace App\Controller\Product;

use App\Celifind\Services\ProductServices;
use App\Celifind\Entities\Product;

class ProductUpdateController{
    private $productservices;
    
    public function __construct(\PDO $db, ProductServices $productservices) {
        $this->db = $db;
        $this->productservices = $productservices;
    }
    
    function productupdates(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            session_start();
            $id = filter_input(INPUT_GET, 'id');
            
            if ($id) {
                $fila = $this->productservices->findById($id);
                
                $errors = $_SESSION['errors'] ?? [];
                unset($_SESSION['errors']);
                
                $formData = $_SESSION['formData'] ?? null;
                unset($_SESSION['formData']);
                
                if (!$formData && $fila) {
                    $formData = [
                        'id' => $fila->getId(),
                        'name' => $fila->getName(),
                        'description' => $fila->getDescription(),
                        'ingredients' => $fila->getIngredients(),
                        'nutritionalinformation' => $fila->getNutritionalInformation(),
                        'price' => $fila->getPrice(),
                        'brand' => $fila->getBrand(),
                        'image' => $fila->getImage(),
                        'weight' => $fila->getWeight(),
                        'state' => $fila->getState(),
                    ];
                }
                
                echo view('product/productupdate', [
                    'formData' => $formData,
                    'errors' => $errors,
                ]);
            }
        }
    }
}