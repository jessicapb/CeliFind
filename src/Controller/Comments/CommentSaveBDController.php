<?php

namespace App\Controller\Comments;

use App\Celifind\Services\CommentServices;
use App\Celifind\Entities\Comments;
use App\Celifind\Exceptions\BuildExceptions;
use App\Celifind\Services\RecipesServices;

class CommentSaveBDController {
    private \PDO $db;
    private CommentServices $CommentServices;
    private RecipesServices $RecipesServices;

    public function __construct(\PDO $db, CommentServices $CommentServices, RecipesServices $RecipesServices) {
        $this->db = $db;
        $this->CommentServices = $CommentServices;
        $this->RecipesServices = $RecipesServices;
    }

    /* Function private to render error for the form of comments */
    private function FormWithErrors($id) {
        $fila = $this->CommentServices->findById($id);

        $errors = $_SESSION['errors'] ?? [];
        unset($_SESSION['errors']);
        
        $formData = $_SESSION['formData'] ?? null;
        unset($_SESSION['formData']);
        
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description');
        $iduser = filter_input(INPUT_POST, 'iduser');
        $idrecipe = filter_input(INPUT_POST, 'idrecipe');
        
        $_SESSION['formData'] = [
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'iduser' => $iduser,
            'idrecipe' => $idrecipe,
        ];
        
        if (!$formData && $fila) {
            $formData = [
                'id' => $fila->id,
                'name' => $fila->name,
                'description' => $fila->description,
                'iduser' => $fila->iduser,
                'idrecipes' => $fila->idrecipes,
            ];
        }
        
        if ($id) {
            $recipes = $this->RecipesServices->findById($id);
            if ($recipes) {
                $formData['idrecipe'] = $recipes->getId();
                $formData['iduser'] = $_SESSION['user']['id'];
            }
        }
        
        echo view('recipes/individualrecipes', [
            'formData' => $formData,
            'errors' => $errors,
            'recipes' => $recipes
        ]);
    }

    public function savecomments() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION['errors'] = [];

            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $iduser = filter_input(INPUT_POST, 'iduser');
            $idrecipe = filter_input(INPUT_POST, 'idrecipe');
            dd($idrecipe);
            if (!$iduser || !$idrecipe) {
                $_SESSION['errors']['global'] = "Error en processar el comentari. Usuari o recepta no vàlida.";
                $this->FormWithErrors($id);
                exit;
            }
            
            try {
                $recipefind = $this->RecipesServices->findById($idrecipe);
                $comments = new Comments($id, $name, $description, $recipefind, $iduser);
                if ($this->CommentServices->exists(trim($name))) {
                    $_SESSION['errors']['name'] = "El comentari ja està registrat.";
                    $this->FormWithErrors($id);
                    exit;
                }

                $this->CommentServices->save($comments);
                header('Location: /recipesindividual');
                exit;

            } catch (BuildExceptions $e) {
                $_SESSION['errors'] = json_decode($e->getMessage(), true);
                $this->FormWithErrors($id);
                exit;
            }
        }
    }
}
