<?php
namespace App\Controller\Product;

use App\Infrastructure\Persistence\ProductRepository;
use App\Celifind\Entities\Product;
use App\Celifind\Exceptions\BuildExceptions;

class ProductUpdateBDController{
    private \PDO $db;
    private ProductRepository $ProductRepository;
    
    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->ProductRepository = new ProductRepository($db);
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
            
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageData = file_get_contents($_FILES['image']['tmp_name']);
            } else {
                $imageData = '';
            }
            try{
                // Create the product
                $product = new Product($id,$name, $description, $ingredients,$nutritionalinformation,$price, $brand, $imageData, $weight, $state);
                
                // If everything is okay, save the product.
                $this->ProductRepository->updateproduct($product);  
                header('Location: /productmanager');
            }catch (BuildExceptions $e) {
                    $_SESSION['error'] = $e->getMessage();
                    header('Location: /productupdates');
                    exit;
            }
        }
    }
}

/* 
$stmt = $db->prepare($sql);
$stmt ->execute([
    'name'  => $request['name']
            => $name
            => $request->name
])
$product = find()
$sql = "UPDATE . . $name"
foreach($datos as $dato){
    $str .= $key.'=''.$value.','
    $name = (filter_input,'name');
}
*/