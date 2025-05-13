<?php

namespace App\Controller\Product;

class ProductAddController {
    function productadd(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /productview');
            exit;
        }
        
        echo view('product/addproduct');
    }
}