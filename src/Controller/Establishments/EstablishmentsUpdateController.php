<?php

namespace App\Controller\Establishments;

use App\Celifind\Services\EstablishmentsServices;
use App\Celifind\Entities\Establishments;

class EstablishmentsUpdateController{
    private $establishmentsServices;
    
    public function __construct(\PDO $db, EstablishmentsServices $establishmentsServices) {
        $this->db = $db;
        $this->establishmentsServices = $establishmentsServices;
    }
    
    function establishmentsupdates(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /locationview');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id');
            
            if ($id) {
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
        }
    }
}