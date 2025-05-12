<?php

namespace App\Controller\Home;

use App\Celifind\Services\ProductServices;
use App\Celifind\Entities\Product;

class HomeController{
    private $productservices;
    private $subcategoryrepository;
    public function __construct(ProductServices $productservices) {
        $this->productservices = $productservices;
    }
    
    public function showLogin()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['user']['id'])) {
            // Si la sesión está iniciada, redirige según el rol
            if (isset($_SESSION['user']['status']) && $_SESSION['user']['status'] == 2) {
                header('Location: /productmanager');
            } else {
                header('Location: /productview');
            }
            exit;
        }
        require VIEWS . '/product/productmanager.view.php'; 
    }
    
    function home(){
        $products = $this->productservices->stateonelimit();
        echo view('home',['products'=>$products]);
    }
}