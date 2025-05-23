<?php

namespace App\Controller\Establishments;


use App\Celifind\Services\EstablishmentsServices;
use App\Infrastructure\Persistence\EstablishmentsRepository;

class EstablishmentsViewController{
    private \PDO $db;
    private EstablishmentsServices $establishmentservices;

    public function __construct(\PDO $db, EstablishmentsServices $establishmentservices) {
        $this->db = $db;
        $this->establishmentservices = $establishmentservices;
    }

    function showestablishment(){

        $allestablishments = $this->establishmentservices->showlimitlocation();
        echo view('establishments/location',['allestablishments'=>$allestablishments]);

    }
}