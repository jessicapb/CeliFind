<?php
namespace App\Controller\Product;

use App\Infrastructure\Persistence\ProductRepository;
use App\Celifind\Services\ProductServices;

class ProductSearchController {
    private \PDO $db;
    private ProductRepository $ProductRepository;
    private ProductServices $ProductService;

    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->ProductRepository = new ProductRepository($db);
        $this->ProductService = new ProductServices($db, $this->ProductRepository);
    }

    public function search() {
        session_start();
        if (trim($name) === '') {
            $_SESSION['search_error'] = "Escriu un nom per buscar.";
            header('Location: /productview');
            exit;
        }
        
        $name = $_POST['name'] ?? '';
        $products = $this->ProductService->searchproduct($name);

        if (empty($products)) {
            $_SESSION['search_error'] = "No s'han trobat productes amb aquest nom.";
        } else {
            $_SESSION['search_results'] = $products;
        }

        header('Location: /productview');
        exit;
    }
}
