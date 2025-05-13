<?php
namespace App\Controller\Establishments;

use App\Celifind\Services\EstablishmentsServices;
use App\Celifind\Entities\Establishments;
use App\Celifind\Exceptions\BuildExceptions;

class EstablishmentsUpdateBDController{
    private \PDO $db;
    private EstablishmentsServices $establishmentsServices;
    
    public function __construct(\PDO $db, EstablishmentsServices $establishmentsServices) {
        $this->db = $db;
        $this->establishmentsServices = $establishmentsServices;
    }
    
    // Private function to render the form with errors
    private function FormWithErrorsEstablishments($id) {
        $fila = $this->establishmentsServices->findByIdUpdate($id);
        
        $errors = $_SESSION['errors'] ?? [];
        unset($_SESSION['errors']);
        
        $formData = $_SESSION['formData'] ?? null;
        unset($_SESSION['formData']);
        
        if (!$formData && $fila) {
            $formData = [
                'id' => $fila->id,
                'name' => $fila->name,
                'description' => $fila->description,
                'location' => $fila->location,
                'phonenumber' => $fila->phonenumber,
                'website' => $fila->website,
                'schedule' => $fila->schedule
            ];
        }
    
        echo view('establishments/establishmentsupdate', [
            'formData' => $formData,
            'errors' => $errors,
        ]);
    }
    
    public function updateestablishments() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Start the session
            session_start();
            $_SESSION['errors'] = [];
            
            // Assign fields
            $id = filter_input(INPUT_POST, 'id');
            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $location = filter_input(INPUT_POST, 'location');
            $phonenumber = filter_input(INPUT_POST, 'phonenumber');
            $website = filter_input(INPUT_POST, 'website');
            $schedule = filter_input(INPUT_POST, 'schedule');
            
            $_SESSION['formData'] = [
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'location' => $location,
                'phonenumber' => $phonenumber,
                'website' => $website,
                'schedule' => $schedule
            ];
            
            if (!empty($_FILES['image']['name'])) {
                $folder = '/img/establishments/imagesbd/';
                $fileName = basename($_FILES['image']['name']);
                $destination = $_SERVER['DOCUMENT_ROOT'] . $folder . $fileName;
                
                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                    $imageData = $folder . $fileName;
                } else {
                    $_SESSION['errors']['image'] = "No s'ha pogut guardar la imatge.";
                    $this->FormWithErrorsEstablishments($id);
                    exit;
                }
            } else {
                $imageData = '';
            }
            
            try{
                // Update the establishment
                $establishment = new Establishments($id,$name, $description, $location, $phonenumber, $website, $schedule, $imageData);
                if ($this->establishmentsServices->existsEstablishments($name, $id)) {
                    $_SESSION['errors']['name'] = 'El nom ja està registrat';
                    $this->FormWithErrorsEstablishments($id);
                    exit;
                }
                
                // If everything is okay, update the product.
                $this->establishmentsServices->update($establishment);  
                $_SESSION['success_update'] = true;
                header('Location: /establishmentsmanager');
            }catch (BuildExceptions $e) {
                $_SESSION['errors']['general'] = $e->getMessage();
                $this->FormWithErrorsEstablishments($id);
                exit;
            }
        }
    }
}