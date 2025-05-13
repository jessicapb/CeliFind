<?php

namespace App\Controller\Establishments;

use App\Celifind\Services\EstablishmentsServices;
use App\Celifind\Entities\Establishments;

class EstablishmentsShowImageController{
    private EstablishmentsServices $establishmentsServices;
    
    public function __construct(EstablishmentsServices $establishmentsServices){
        $this->establishmentsServices = $establishmentsServices;
    }
    
    function establishmentsshowimage(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /locationview');
            exit;
        }
        
        $establishments = $this->establishmentsServices->showlimit();
        echo view('establishments/establishmentsmanagerimage',['establishments'=>$establishments]);
    }
}