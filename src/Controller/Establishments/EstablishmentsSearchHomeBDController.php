<?php

namespace App\Controller\Establishments;

use App\Celifind\Services\EstablishmentsServices;
use App\Celifind\Entities\Establishments;

class EstablishmentsSearchHomeBDController{
    private \PDO $db;
    private EstablishmentsServices $establishmentsServices;
    
    public function __construct(\PDO $db, EstablishmentsServices $establishmentsServices) {
        $this->db = $db;
        $this->establishmentsServices = $establishmentsServices;
    }
    
    public function searchestablishmentshome() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'name');
            
            if (empty($name)) {
                $_SESSION['no_results'] = true;
                $_SESSION['search_results'] = []; 
                header('Location: /showsearchresultsestablishments');
                exit;
            }
            
            try {
                $establishments = $this->establishmentsServices->search(trim($name));
                
                $_SESSION['search_results'] = $establishments;
                $_SESSION['no_results'] = empty($establishments); 
                
                header('Location: /showsearchresultsestablishments');
                exit;
            } catch (BuildExceptions $e) {
                $_SESSION['error'] = "Error al realitzar la cerca.";
                header('Location: /locationview');
                exit;
            }
        }
    }
    
    public function showsearchresultsestablishments() {
        session_start();
        
        $allestablishments = [];
        $noResults = false;
        
        if (isset($_SESSION['search_results']) && isset($_SESSION['no_results'])) {
            $allestablishments = $_SESSION['search_results'];
            $noResults = $_SESSION['no_results'];
            unset($_SESSION['search_results'], $_SESSION['no_results']);
        }
        
        echo view('establishments/location', ['allestablishments' => $allestablishments, 'noResults' => $noResults]);
    }
}
