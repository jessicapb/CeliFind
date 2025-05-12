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
        $establishments = $this->establishmentsServices->showlimit();
        echo view('establishments/establishmentsmanagerimage',['establishments'=>$establishments]);
    }
}