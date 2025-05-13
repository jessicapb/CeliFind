<?php
namespace App\Controller\Product;

use App\Celifind\Services\ProductServices;
use App\Celifind\Entities\Product;
use App\Celifind\Exceptions\BuildExceptions;

class ProductUpdateBDController{
    private \PDO $db;
    private ProductServices $productservices;
    
    public function __construct(\PDO $db, ProductServices $productservices) {
        $this->db = $db;
        $this->productservices = $productservices;
    }
    
    // Private function to render the form with errors
    private function FormWithErrorsProduct($id) {
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
    
    public function updateproduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Start the session
            session_start();
            $_SESSION['errors'] = [];
            
            // Assign fields
            $id = filter_input(INPUT_POST, 'id');
            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $ingredients = filter_input(INPUT_POST, 'ingredients');
            $nutritionalinformation = filter_input(INPUT_POST, 'nutritionalinformation');
            $price = filter_input(INPUT_POST, 'price');
            $brand = filter_input(INPUT_POST, 'brand');
            $weight = filter_input(INPUT_POST, 'weight');
            $state = filter_input(INPUT_POST, 'state');
            
            $_SESSION['formData'] = [
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'ingredients' => $ingredients,
                'nutritionalinformation' => $nutritionalinformation,
                'price' => $price,
                'brand' => $brand,
                'weight' => $weight,
                'state' => $state,
            ];
            
            if (!empty($_FILES['image']['name'])) {
                $folder = '/home/linux/CeliFind/img/producte/imagesbd/';
                $fileName = $_FILES['image']['name'];
                $destination = $folder . $fileName;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                    $imageData = '/img/producte/imagesbd/' . $fileName;
                } else {
                    $_SESSION['errors']['image'] = "No s'ha pogut guardar la imatge.";
                    $this->FormWithErrorsProduct($id);
                    exit;
                }
            }else{
                $imageData = '';
            }
            
            try{
                // Update the product
                $product = new Product($id,$name, $description, $ingredients,$nutritionalinformation,$price, $brand, $imageData, $weight, $state);
                
                if ($this->productservices->existsProduct($name, $id)) {
                    $_SESSION['errors']['name'] = 'El nom ja està registrat';
                    $this->FormWithErrorsProduct($id);
                    exit;
                }
                
                // If everything is okay, update the product.
                $this->productservices->update($product);  
                $_SESSION['success_update'] = true;
                header('Location: /productmanager');
            }catch (BuildExceptions $e) {
                $_SESSION['errors']['general'] = $e->getMessage();
                $this->FormWithErrorsProduct($id);
                exit;
            }
        }
    }
}