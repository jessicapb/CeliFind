<?php

namespace App\Controller\Pages;

use App\Celifind\Services\EstablishmentsServices;
use App\Infrastructure\Persistence\EstablishmentsRepository;

class EstablishmentsController {

    private \PDO $db;
    private EstablishmentsServices $establishmentservices;

    public function __construct(\PDO $db, EstablishmentsServices $establishmentservices) {
        $this->db = $db;
        $this->establishmentservices = $establishmentservices;
    }

    function showestablishment(){

        $allestablishments = $this->establishmentservices->showlimit();
        echo view('locations/location',['allestablishments'=>$allestablishments]);

    }

}