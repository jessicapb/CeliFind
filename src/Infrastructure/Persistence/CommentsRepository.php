<?php

namespace App\Infrastructure\Persistence;

use App\Celifind\Entities\Comments;
use App\Celifind\Exceptions\BuildExceptions;

class CommentsRepository{
    private \PDO $db;

    function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /* function to get all of the comments */
    function getall(): array
    {
        $result_comments = [];
        $sql = $this->db->prepare("SELECT * FROM comments");
        $sql->execute();
        $comments = $sql->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($comments as $comment) {
            $result_comments[] = new Comments($comment['id'], $comment['name'], $comment['description'], $comment['idrecipes'], $comment['iduser']);
        }
        return $result_comments;
    }
     
    /* Query SQL Save */
    function save(Comments $comments)
    {
        try {
            $sql = $this->db->prepare("INSERT INTO comments(id, name, description, idrecipes, iduser) VALUES(:id,:name, :description, :idrecipes, :iduser)");
            $sql->execute([
                'id' => $comments->getId(),
                'name' => trim($comments->getName()),
                'description' => trim($comments->getDescription()),
                'idrecipes' => $comments->getIdrecipes(),
                'iduser' => $comments->getIduser(),
            ]);
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error saving comment:" . $e->getMessage());
        }
    }

    /* Query SQL Exists */
    function exists(string $name): bool
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM comments WHERE name = :name");
            $stmt->execute(['name' => $name]);
            if($stmt->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error checking comment existence by ID: " . $e->getMessage());
        }
    }

    /* Query SQL Comments via Name & ID */
    function existsComment(string $name, int $id): bool
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM comments WHERE name = :name AND idrecipes = :id");
            $stmt->execute(['name' => $name, 'id' => $id]);
            if($stmt->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error checking comment existence by ID: " . $e->getMessage());
        }
    }
    
    /* Query SQL Found Comments of a Recipe by ID */
    function getCommentsByIdRecipe(int $idrecipe): array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM comments WHERE idrecipes = :idrecipes");
            $stmt->execute(['idrecipes' => $idrecipe]);
            $comments = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $result_comments = [];
            foreach ($comments as $comment) {
                $result_comments[] = new Comments(
                    (int)$comment['id'],
                    $comment['name'],
                    $comment['description'],
                    (int)$comment['idrecipes'],
                    (int)$comment['iduser']
                );
            }
            return $result_comments;

        } catch (\PDOException $e) {
            throw new BuildExceptions("Error fetching comments by recipe ID:" . $e->getMessage());
        }
    }

    /* Query SQL Limit User Comments */
    function getCommentsByIdUser(int $iduser, int $idrecipe): bool
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM comments WHERE iduser = :iduser AND idrecipes = :idrecipes");
            $stmt->execute(['iduser' => $iduser, 'idrecipes' => $idrecipe]);
            return $stmt->rowCount() > 0; 
        } catch (\PDOException $e) {
            throw new BuildExceptions("Error checking if user has commented on recipe: " . $e->getMessage());
        }
    }
    
    /* Query SQL Found Comments by ID */
    function findById(int $id): ?object{
        $sql = $this->db->prepare("SELECT * FROM comments WHERE id = :id");
        $sql->execute([':id' => $id]);
        $comment = $sql->fetch(\PDO::FETCH_OBJ);
        if ($comment) {
            return $comment;
        } else {
            return null;
        }
    }
}