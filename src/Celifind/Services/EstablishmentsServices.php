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
    
    function existsEstablishments(string $name, int $id):bool{
        return $this->EstablishmentsRepository->existsEstablishments($name, $id);
    }
    
    function save(Establishments $establishments){
        $recipes = $this->EstablishmentsRepository->save($establishments);
        return $establishments;
    }
    
    function showlimit(){
        return $this->EstablishmentsRepository->showlimit();
    }
    
    function showlimitlocation(){
        return $this->EstablishmentsRepository->showlimitlocation();
    }
    
    function update(Establishments $establishments){
        return $this->EstablishmentsRepository->updateEstablishments($establishments);
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
    
    function search($name){
        if(empty($name)){
            return $this->EstablishmentsRepository->showlimitlocation();
        }
        return $this->EstablishmentsRepository->search($name);
    }
    
    function findByIdUpdate(int $id){
        return $this->EstablishmentsRepository->findByIdUpdate($id);
    }
}