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
        $establishments = $this->establishmentsservices->showlimit();
        echo view('establishments/establishmentsmanager',['establishments'=>$establishments]);
    }
}