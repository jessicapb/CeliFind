<?php

namespace App\Controller\Establishments;

use App\Celifind\Services\EstablishmentsServices;
use App\Celifind\Entities\Establishments;

class EstablishmentsSearchBDController{
    private \PDO $db;
    private EstablishmentsServices $establishmentsServices;
    
    public function __construct(\PDO $db, EstablishmentsServices $establishmentsServices) {
        $this->db = $db;
        $this->establishmentsServices = $establishmentsServices;
    }
    
    public function searchestablishments() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'name');
            
            if (empty($name)) {
                $_SESSION['no_results'] = true;
                $_SESSION['search_results'] = []; 
                header('Location: /showsearchresults');
                exit;
            }
            
            try {
                $establishments = $this->establishmentsServices->searchestablishments(trim($name));
                
                $_SESSION['search_results'] = $establishments;
                $_SESSION['no_results'] = empty($establishments); 
                
                header('Location: /showsearchresults');
                exit;
            } catch (BuildExceptions $e) {
                $_SESSION['error'] = "Error al realitzar la cerca.";
                header('Location: /establishmentsmanager');
                exit;
            }
        }
    }
    
    public function showsearchresults() {
        session_start();
        
        $establishments = [];
        $noResults = false;
        
        if (isset($_SESSION['search_results']) && isset($_SESSION['no_results'])) {
            $establishments = $_SESSION['search_results'];
            $noResults = $_SESSION['no_results'];
            unset($_SESSION['search_results'], $_SESSION['no_results']);
        }
        
        echo view('establishments/establishmentsmanager', ['establishments' => $establishments, 'noResults' => $noResults]);
    }
}
