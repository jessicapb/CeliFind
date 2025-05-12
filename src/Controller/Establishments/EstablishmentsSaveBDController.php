<?php

namespace App\Controller\Establishments;

use App\Infrastructure\Persistence\EstablishmentsRepository;
use App\Celifind\Services\EstablishmentsServices;
use App\Celifind\Entities\Establishments;
use App\Celifind\Exceptions\BuildExceptions;

class EstablishmentsSaveBDController{
    private \PDO $db;
    private EstablishmentsRepository $EstablishmentsRepository;
    private EstablishmentsServices $EstablishmentsServices;
    
    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->EstablishmentsRepository = new EstablishmentsRepository($db);
        $this->EstablishmentsServices = new EstablishmentsServices($db, $this->EstablishmentsRepository);
    }
    
    public function savestablishments(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Start the session
            session_start();
            $_SESSION['errors'] = [];
            
            // Assign fields
            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $location = filter_input(INPUT_POST, 'location');
            $phonenumber = filter_input(INPUT_POST, 'phonenumber');
            $website = filter_input(INPUT_POST, 'website');
            $schedule = filter_input(INPUT_POST, 'schedule');
            
            if (!empty($_FILES['image']['name'])) {
                $folder = '/img/establishments/imagesbd/';
                $fileName = basename($_FILES['image']['name']);
                $destination = $_SERVER['DOCUMENT_ROOT'] . $folder . $fileName;
                
                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                    $imageData = $folder . $fileName;
                } else {
                    $_SESSION['errors']['image'] = "No s'ha pogut guardar la imatge.";
                    header('Location: /establishmentsadd');
                    exit;
                }
            } else {
                $imageData = '';
            }
            
            try{
                // Create the product
                $establishments = new Establishments(null, $name, $description, $location, $phonenumber, $website, $schedule, $imageData);
                // Validate if the name exists
                if ($this->EstablishmentsServices->exists(trim($name))) {
                    $_SESSION['errors']['name'] = "El nom ja està registrat.";
                    header('Location: /establishmentsadd');
                    exit;
                }
                
                // If everything is okay, save the product.
                $this->EstablishmentsServices->save($establishments);  
                $_SESSION['success_add'] = true;
                header('Location: /establishmentsmanager');
            }catch (BuildExceptions $e) {
                $_SESSION['error'] = $e->getMessage();
                header('Location: /establishmentsadd');
                exit;
            }
        }
    }
}