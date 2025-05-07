<?php

namespace App\Infrastructure\Persistence;

use App\Celifind\Entities\Establishments;
use App\Celifind\Exceptions\BuildExceptions;

class EstablishmentsRepository{
    private \PDO $db;
    
    function __construct(\PDO $db){
        $this->db = $db;
    }
    
    // Exists
    function exists(string $name): bool{
        try {
            $stmt = $this->db->prepare("SELECT * FROM establishments WHERE name = :name");
            $stmt->execute(['name' => $name]);
            if($stmt->rowCount()> 0){
                return true;
            }else{
                return false;
            }
        } catch (\PDOException $ex) {
            throw new BuildExceptions("Error checking if the establishments exists:" . $ex->getMessage());
        }
    }
    
    // Insert
    function save(Establishments $establishments){
        try {
            $sql = $this->db->prepare("INSERT INTO establishments(id, name, description, location, schedule, letter, image) VALUES(:id,:name, :description, :location, :schedule, :letter, :image");
            $sql->execute([
                'id' => $establishments->getId(),
                'name' => trim($establishments->getName()),
                'description' => trim($establishments->getDescription()),
                'ingredients' => $establishments->getLocation(),
                'nutritionalinformation' => $establishments->getSchedule(),
                'price' => $establishments->getLetter(),
                'image' => $establishments->getImage(),
            ]);
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error saving product:" . $e->getMessage());
        }
    }
}