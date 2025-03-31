<?php
namespace App\Controller\Product;

use App\Infrastructure\Persistence\ProductRepository;
use App\Celifind\Entities\Product;
use App\Celifind\Exceptions\BuildExceptions;
use App\Celifind\Checks\Product\ValidationForm;

class ProductToSubcategoryBDController{
    private \PDO $db;
    private ProductRepository $ProductRepository;
    
    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->ProductRepository = new ProductRepository($db);
    }
    
    public function saveproduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $ingredients = filter_input(INPUT_POST, 'ingredients');
            $nutritionalinformation = filter_input(INPUT_POST, 'nutritionalinformation');
            $price = filter_input(INPUT_POST, 'price');
            $brand = filter_input(INPUT_POST, 'brand');
            $weight = filter_input(INPUT_POST, 'weight');
            $state = filter_input(INPUT_POST, 'state');
    
            try{
                // Create the product
                $product = new Product(null,$name, $description, $ingredients,$nutritionalinformation,$price, $brand, $weight, $state);
                
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