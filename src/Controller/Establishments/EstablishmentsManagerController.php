<?php

namespace App\Controller\Establishments;

use App\Celifind\Services\EstablishmentsServices;
use App\Celifind\Entities\Establishments;

class EstablishmentsManagerController{
    private $establishmentsservices;
    
    public function __construct(EstablishmentsServices $establishmentsservices) {
        $this->establishmentsservices = $establishmentsservices;
    }
    
    function establishmentsmanager(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /locationview');
            exit;
        }
        $establishments = $this->establishmentsservices->showlimit();
        echo view('establishments/establishmentsmanager',['establishments'=>$establishments]);
    }
}