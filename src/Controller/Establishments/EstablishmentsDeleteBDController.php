<?php

namespace App\Controller\Establishments;

use App\Infrastructure\Persistence\EstablishmentsRepository;
use App\Celifind\Services\EstablishmentsServices;
use App\Celifind\Entities\Establishments;

class EstablishmentsDeleteBDController{
    private EstablishmentsRepository $establishmentsRepository;
    private EstablishmentsServices $establishmentsServices;
    
    public function __construct(\PDO $db) {
        $this->db = $db;
        $this->establishmentsRepository = new EstablishmentsRepository($db);
        $this->establishmentsServices = new EstablishmentsServices($db, $this->establishmentsRepository);
    }
    
    function deleteestablishments(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['status'] != 2) {
            header('Location: /locationview');
            exit;
        }
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_input(INPUT_POST, 'id');
            
            if($this->establishmentsServices->delete($id)){
                header('Location: /establishmentsmanager?deleted=true');
                exit();
            }
        }        
    } 
}