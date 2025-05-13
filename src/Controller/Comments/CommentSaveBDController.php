<?php

namespace App\Controller\Comments;

use App\Celifind\Services\CommentServices;
use App\Celifind\Entities\Comments;
use App\Celifind\Exceptions\BuildExceptions;

class CommentSaveBDController {
    private \PDO $db;
    private CommentServices $CommentServices;

    public function __construct(\PDO $db, CommentServices $CommentServices) {
        $this->db = $db;
        $this->CommentServices = $CommentServices;
    }

    public function savecomments() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION['errors'] = [];

            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $iduser = filter_input(INPUT_POST, 'iduser');
            $idrecipe = filter_input(INPUT_POST, 'idrecipe',);

            if (!$iduser || !$idrecipe) {
                $_SESSION['errors']['global'] = "Error al procesar el comentario. Usuario o receta no válidos.";
                header('Location: /recipesindividual');
                exit;
            }

            try {
                $comments = new Comments(null, $name, $description, $idrecipe, $iduser);

                if ($this->CommentServices->exists(trim($name))) {
                    $_SESSION['errors']['name'] = "El comentari ja està registrat.";
                    header('Location: /recipesindividual');
                    exit;
                }

                // Guardar el comentario
                $this->CommentServices->save($comments);

                header('Location: /recipesindividual');
                exit;

            } catch (BuildExceptions $e) {
                $_SESSION['errors'] = json_decode($e->getMessage(), true) ?? ['global' => 'Error inesperado.'];
                header('Location: /recipesindividual');
                exit;
            }
        }
    }
}
