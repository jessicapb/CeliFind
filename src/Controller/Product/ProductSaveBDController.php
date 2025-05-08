<?php

namespace App\Controller\Product;

use App\Infrastructure\Persistence\ProductRepository;
use App\Celifind\Services\ProductServices;
use App\Celifind\Entities\Product;
use App\Celifind\Exceptions\BuildExceptions;

class ProductSaveBDController{
    private \PDO $db;
    private ProductRepository $ProductRepository;
    private ProductServices $ProductServices;
    
    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->ProductRepository = new ProductRepository($db);
        $this->ProductService = new ProductServices($db, $this->ProductRepository);
    }
    
    public function saveproduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Start the session
            session_start();
            $_SESSION['errors'] = [];
            
            // Assign fields
            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $ingredients = filter_input(INPUT_POST, 'ingredients');
            $nutritionalinformation = filter_input(INPUT_POST, 'nutritionalinformation');
            $price = filter_input(INPUT_POST, 'price');
            $brand = filter_input(INPUT_POST, 'brand');
            $weight = filter_input(INPUT_POST, 'weight');
            $state = filter_input(INPUT_POST, 'state');
            
            if (!empty($_FILES['image']['name'])) {
                $folder = '/home/linux/CeliFind/img/producte/imagesbd/';
                $fileName = $_FILES['image']['name'];
                $destination = $folder . $fileName;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                    $imageData = '/img/producte/imagesbd/' . $fileName;
                } else {
                    $_SESSION['errors']['image'] = "No s'ha pogut guardar la imatge.";
                    header('Location: /productadd');
                    exit;
                }
            }else{
                $imageData = '';
            }
            
            try{
                // Create the product
                $product = new Product(null,$name, $description, $ingredients,$nutritionalinformation,$price, $brand, $imageData, $weight, $state);
                
                // Validate if the name exists
                if ($this->ProductService->exists(trim($name))) {
                    $_SESSION['errors']['name'] = "El nom ja està registrat.";
                    header('Location: /productadd');
                    exit;
                }
                
                // If everything is okay, save the product.
                $this->ProductService->save($product);  
                header('Location: /productmanager');
            }catch (BuildExceptions $e) {
                $_SESSION['error'] = $e->getMessage();
                header('Location: /productadd');
                exit;
            }
        }
    }
}