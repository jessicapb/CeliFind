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
                    header('Location: /productupdates?id=' . urlencode($id));
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
                    header('Location: /productupdates?id=' . urlencode($id));
                    exit;
                }
                
                // If everything is okay, update the product.
                $this->productservices->update($product);  
                $_SESSION['success_update'] = true;
                header('Location: /productmanager');
            }catch (BuildExceptions $e) {
                $_SESSION['errors']['general'] = $e->getMessage();
                header('Location: /productupdates?id=' . urlencode($id));
                exit;
            }
        }
    }
}