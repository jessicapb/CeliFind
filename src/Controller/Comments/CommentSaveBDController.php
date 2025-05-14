<?php

namespace App\Controller\Comments;

use App\Celifind\Services\CommentServices;
use App\Celifind\Entities\Comments;
use App\Celifind\Exceptions\BuildExceptions;
use App\Celifind\Services\RecipesServices;

class CommentSaveBDController
{
    private \PDO $db;
    private CommentServices $CommentServices;
    private RecipesServices $RecipesServices;

    public function __construct(\PDO $db, CommentServices $CommentServices, RecipesServices $RecipesServices)
    {
        $this->db = $db;
        $this->CommentServices = $CommentServices;
        $this->RecipesServices = $RecipesServices;
    }

    private function FormWithErrors($id)
    {
        $fila = $this->CommentServices->findById((int)$id);

        $errors = $_SESSION['errors'] ?? [];
        unset($_SESSION['errors']);

        $formData = $_SESSION['formData'] ?? null;
        unset($_SESSION['formData']);

        if (!$formData && $fila) {
            $formData = [
                'id' => $fila->id,
                'name' => $fila->name,
                'description' => $fila->description,
                'idrecipes' => $fila->idrecipes,
                'iduser' => $fila->iduser,
            ];
        }

        $recipe = $this->RecipesServices->findById($id);
        $comments = $this->CommentServices->getCommentsByIdRecipe($id);

        echo view('recipes/individualrecipes', [
            'formData' => $formData,
            'errors' => $errors,
            'recipes' => $recipe,
            'comments' => $comments,
        ]);
    }


    public function savecomments()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION['errors'] = [];

            $id = filter_input(INPUT_POST, 'id');
            $id = ($id !== null && $id !== '' && is_numeric($id)) ? (int) $id : null;
            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $iduser = filter_input(INPUT_POST, 'iduser');
            $idrecipes = filter_input(INPUT_POST, 'idrecipes');

            $_SESSION['formData'] = [
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'idrecipes' => $idrecipes,
                'iduser' => $iduser,
            ];

            if (empty($iduser) || empty($idrecipes)) {
                $_SESSION['errors']['general'] = "Usuario o receta no válidos.";
                $this->FormWithErrors($id);
                return;
            }

            if (empty($name) || empty($description)) {
                $_SESSION['errors']['general'] = "Faltan datos obligatorios en el formulario.";
                $this->FormWithErrors($id);
                return;
            }

            try {

                $comments = new Comments($id, $name, $description, $idrecipes, $iduser);
                if ($this->CommentServices->exists(trim($name))) {
                    $_SESSION['errors']['name'] = "El comentario ya está registrado.";
                    $this->FormWithErrors($id);
                    return;
                }


                $this->CommentServices->save($comments);
                header('Location: /receptes');
                exit;
            } catch (BuildExceptions $e) {
                $_SESSION['errors']['general'] = $e->getMessage();
                $this->FormWithErrors($id);
                return;
            }
        }
    }
}
