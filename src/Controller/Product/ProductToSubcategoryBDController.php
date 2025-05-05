<?php
namespace App\Controller\Product;

use App\Infrastructure\Persistence\ProductRepository;
use App\Celifind\Services\ProductServices;
use App\Infrastructure\Persistence\SubcategoryRepository;
use App\Celifind\Exceptions\BuildExceptions;
use App\Celifind\Entities\Product;

class ProductToSubcategoryBDController{
    private \PDO $db;
    private ProductRepository $productrepository;
    private ProductServices $productservices;
    private SubcategoryRepository $subcategoryrepository;

    public function __construct(\PDO $db){
        $this->db = $db;
        
        $this->productrepository = new ProductRepository($db);
        $this->subcategoryrepository = new SubcategoryRepository($db);
        
        $this->productservices = new ProductServices($db, $this->productrepository);
    }
    
    function addProducttoSubcategory(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Start the session
            session_start();
            $_SESSION['errors'] = [];
            
            $product_id = (int) filter_input(INPUT_POST, 'product');
            $subcategory_id = (int) filter_input(INPUT_POST, 'subcategory');
            
            if (empty($product_id)) {
                $_SESSION['errors']['product'] = "Producte és obligatori.";
            }
            
            if (empty($subcategory_id)) {
                $_SESSION['errors']['subcategory'] = "Subcategoria és obligatòria.";
            }
            
            if (!empty($_SESSION['errors'])) {
                header('Location: /producttocategory');
                exit;
            }
            
            try {
                $product = $this->productservices->findById($product_id);
                if ($product === null) {
                    $_SESSION['errors']['product'] = "Producte no trobat.";
                    header('Location: /producttocategory');
                    exit;
                }
                
                $subcategory = $this->subcategoryrepository->findById($subcategory_id);
                if ($subcategory === null) {
                    $_SESSION['errors']['subcategory'] = "Subcategoria no trobada.";
                    header('Location: /producttocategory');
                    exit;
                }
                $product->setSubcategoryId($subcategory_id);
                $this->productservices->update($product);
                header('Location: /productmanager');
            } catch (BuildExceptions $e) {
                $e->getMessage();
                $_SESSION['errors'] = $e->getMessage();
                header('Location: /producttocategory');
                exit;
            }
        }
    }
}