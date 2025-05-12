<?php

namespace App\Celifind\Services;

use App\Infrastructure\Persistence\EstablishmentsRepository;
use App\Celifind\Entities\Establishments;

class EstablishmentsServices{
    private \PDO $db;
    private EstablishmentsRepository $EstablishmentsRepository;
    
    function __construct(\PDO $db, EstablishmentsRepository $EstablishmentsRepository){
        $this->db = $db;
        $this->EstablishmentsRepository = $EstablishmentsRepository;
    }
    
    function exists(string $name):bool{
        return $this->EstablishmentsRepository->exists($name);
    }
    
    function save(Establishments $establishments){
        $recipes = $this->EstablishmentsRepository->save($establishments);
        return $establishments;
    }
    
    function showlimit(){
        return $this->EstablishmentsRepository->showlimit();
    }
    
    function delete(int $id){
        return $this->EstablishmentsRepository->deleteEstablishments($id);
    }
    
    function searchestablishments($name){
        if(empty($name)){
            return $this->EstablishmentsRepository->showlimit();
        }
        return $this->EstablishmentsRepository->searchestablishments($name);
    }
}