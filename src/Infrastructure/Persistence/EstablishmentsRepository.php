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
    
    // Exists name and id
    function existsEstablishments(string $name, int $id): bool{
        try {
            $stmt = $this->db->prepare("SELECT * FROM establishments WHERE name = :name AND id != :id");
            $stmt->execute(['name' => $name, 'id' => $id]);    
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $ex) {
            throw new BuildExceptions("Error checking if the establishments exists:" . $ex->getMessage());
        }
    }
    
    // Insert
    function save(Establishments $establishments){
        try {
            $sql = $this->db->prepare("INSERT INTO establishments (id, name, description, location, phonenumber, website, schedule, image) VALUES(:id,:name, :description, :location, :phonenumber, :website, :schedule, :image)");
            $sql->execute([
                'id' => $establishments->getId(),
                'name' => trim($establishments->getName()),
                'description' => trim($establishments->getDescription()),
                'location' => trim($establishments->getLocation()),
                'phonenumber' => trim($establishments->getPhoneNumber()),
                'website' => trim($establishments->getWebsite()),
                'schedule' => trim($establishments->getSchedule()),
                'image' => trim($establishments->getImage()),
            ]);
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error saving establishments:" . $e->getMessage());
        }
    }
    
    // Select limit
    function showlimit(){
        $allestablishments = [];
        $sql = $this->db->prepare("SELECT id, SUBSTRING(name, 1, 15) AS name_short, SUBSTRING(description, 1, 12) AS description_short, SUBSTRING(location, 1, 13) AS location_short, 
                                    phonenumber, website, SUBSTRING(schedule, 1, 8) AS schedule_short, image FROM establishments");
        $sql->execute();
        while($fila = $sql->fetch(\PDO::FETCH_ASSOC)){
            $establishments = new Establishments($fila['id'], $fila['name_short'], $fila['description_short'], $fila['location_short'], $fila['phonenumber'], $fila['website'], $fila['schedule_short'], $fila['image']);
            $allestablishments[] = $establishments;
        }
        return $allestablishments;
    }
    
    // Select limit
    function showlimitlocation(){
        $allestablishments = [];
        $sql = $this->db->prepare("SELECT id, name, SUBSTRING(description, 1, 25) AS description_short, location,  phonenumber, website, SUBSTRING(schedule, 1, 8) AS schedule_short, image FROM establishments");
        $sql->execute();
        while($fila = $sql->fetch(\PDO::FETCH_ASSOC)){
            $establishments = new Establishments($fila['id'], $fila['name'], $fila['description_short'], $fila['location'], $fila['phonenumber'], $fila['website'], $fila['schedule_short'], $fila['image']);
            $allestablishments[] = $establishments;
        }
        return $allestablishments;
    }
    
    // Delete
    function deleteEstablishments(int $id): bool {
        $sql = $this->db->prepare("DELETE FROM establishments WHERE id = :id");
        return $sql->execute([
            ':id' => $id
        ]);
        dd($id);
    }
    
    // Search 
    function searchestablishments(string $name):array {
        $stmt = $this->db->prepare("SELECT id, SUBSTRING(name, 1, 15) AS name_short, SUBSTRING(description, 1, 12) AS description_short, SUBSTRING(location, 1, 13) AS location_short, 
                                    phonenumber, website, SUBSTRING(schedule, 1, 8) AS schedule_short, image FROM establishments WHERE name LIKE :name");
        $stmt->execute([':name' => '%' . $name . '%']);
        $establishments = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $result = [];
        foreach($establishments as $establishment){
            $result[] = new Establishments($establishment['id'], $establishment['name_short'], $establishment['description_short'], $establishment['location_short'], $establishment['phonenumber'], $establishment['website'], $establishment['schedule_short'], $establishment['image']);
        }
        return $result;
    }
    
    // Search establishments
    function search(string $name):array {
        $sql = $this->db->prepare("SELECT id, name, SUBSTRING(description, 1, 25) AS description_short, location,  phonenumber, website, SUBSTRING(schedule, 1, 8) AS schedule_short, 
        image FROM establishments WHERE name LIKE :name");
        $sql->execute([':name' => '%' . $name . '%']);
        $establishment = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $result = [];
        foreach($establishment as $establishments){
            $result[] = new Establishments($establishments['id'], $establishments['name'], $establishments['description_short'], $establishments['location'], $establishments['phonenumber'], $establishments['website'], $establishments['schedule_short'], $establishments['image']);
        }
        return $result;
    }
    
    // Update
    function updateEstablishments(Establishments $establishments){
        try {
            $sql = $this->db->prepare("UPDATE establishments SET name = :name, description = :description, location = :location, phonenumber =:phonenumber, website = :website, schedule = :schedule, image = :image 
                                        WHERE id = :id");
            $sql->execute([
                'id' => $establishments->getId(),
                'name' => trim($establishments->getName()),
                'description' => trim($establishments->getDescription()),
                'location' => trim($establishments->getLocation()),
                'phonenumber' => trim($establishments->getPhoneNumber()),
                'website' => trim($establishments->getWebsite()),
                'schedule' => trim($establishments->getSchedule()),
                'image' => trim($establishments->getImage()),
            ]);
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error updating product:" . $e->getMessage());
        }
    }
    
    // Select with id for the update
    public function findByIdUpdate(int $id): ?object {
        $sql = $this->db->prepare("SELECT * FROM establishments WHERE id = :id");
        $sql->bindParam(':id', $id, \PDO::PARAM_INT);
        $sql->execute();
        
        $result = $sql->fetch(\PDO::FETCH_OBJ);
        if($result){
            return $result;
        }else{
            return null;
        }
    }
}