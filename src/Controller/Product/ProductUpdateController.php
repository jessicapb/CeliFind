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
                $fila = $this->productservices->findByIdUpdate($id);
                $errors = $_SESSION['errors'] ?? [];
                unset($_SESSION['errors']);
                
                $formData = $_SESSION['formData'] ?? null;
                unset($_SESSION['formData']);
                
                if (!$formData && $fila) {
                    $formData = [
                        'id' => $fila->id,
                        'name' => $fila->name,
                        'description' => $fila->description,
                        'ingredients' => $fila->ingredients,
                        'nutritionalinformation' => $fila->nutritionalinformation,
                        'price' => $fila->price,
                        'brand' => $fila->brand,
                        'image' => $fila->image,
                        'weight' => $fila->weight,
                        'state' => $fila->state,
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