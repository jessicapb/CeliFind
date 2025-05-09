<?php
namespace App\Controller\Recipes;

use App\Celifind\Services\RecipesServices;
use App\Celifind\Exceptions\BuildExceptions;

class RecipesSearchAllBDController {
    private \PDO $db;
    private RecipesServices $recipesServices;
    
    public function __construct(\PDO $db, RecipesServices $recipesServices) {
        $this->db = $db;
        $this->recipesServices = $recipesServices;
    }
    
    public function searchrecipesall() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'name');
            
            if (empty($name)) {
                $_SESSION['no_results'] = true;
                $_SESSION['search_results'] = []; 
                header('Location: /showsearchresultsrecipesall');
                exit;
            }
            
            try {
                $recipes = $this->recipesServices->searchrecipesall($name);
                $_SESSION['search_results'] = $recipes;
                $_SESSION['no_results'] = empty($recipes); 
                
                header('Location: /showsearchresultsrecipesall');
                exit;
            } catch (BuildExceptions $e) {
                $_SESSION['error'] = "Error al realitzar la cerca.";
                header('Location: /receptes');
                exit;
            }
        }
    }
    
    public function showsearchresultsrecipesall() {
        session_start();
        
        $recipes = [];
        $noResults = false;
        
        if (isset($_SESSION['search_results']) && isset($_SESSION['no_results'])) {
            $recipes = $_SESSION['search_results'];
            $noResults = $_SESSION['no_results'];
        }
        unset($_SESSION['search_results'], $_SESSION['no_results']);
        
        echo view('recipes/recipes', ['recipes' => $recipes, 'noResults' => $noResults]);
    }
}
