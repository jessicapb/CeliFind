<?php
namespace App\Controller\Product;

use App\Infrastructure\Persistence\ProductRepository;
use App\Celifind\Entities\Product;
use App\Celifind\Exceptions\BuildExceptions;

class ProductSaveBDController{
    private \PDO $db;
    private ProductRepository $ProductRepository;
    
    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->ProductRepository = new ProductRepository($db);
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
            
            // Upload image
            // Comprobamos si hay un campo image y si se ha subido correctamente la imagen
            // Si funciona correctamente guarda la imagen dentro de $imagenData
            // Se pone tmp_name porque cuando subimos la imagen temporalmente se guarda en la carpeta tmp
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageData = file_get_contents($_FILES['image']['tmp_name']);
            } else {
                $imageData = '';
            }
            try{
                // Create the product
                $product = new Product(null,$name, $description, $ingredients,$nutritionalinformation,$price, $brand, $imageData, $weight, $state);
                
                // Validate if the name exists
                if ($this->ProductRepository->exists($name)) {
                    $_SESSION['errors']['name'] = "El nom ja està registrat.";
                    header('Location: /productadd');
                    exit;
                }
                
                // If everything is okay, save the product.
                $this->ProductRepository->save($product);  
                header('Location: /productmanager');
            }catch (BuildExceptions $e) {
                    $_SESSION['error'] = $e->getMessage();
                    header('Location: /productadd');
                    exit;
            }
        }
    }
}