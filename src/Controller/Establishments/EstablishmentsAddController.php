<?php

namespace App\Controller\Establishments;

class EstablishmentsAddController {
    function establishmentsadd(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /locationview');
            exit;
        }
        
        echo view('establishments/addestablishments');
    }
}