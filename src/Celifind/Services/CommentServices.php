<?php

namespace App\Celifind\Services;

use App\Infrastructure\Persistence\CommentsRepository;
use App\Celifind\Entities\Comments;
use App\Celifind\Exceptions\BuildExceptions;

class CommentServices
{
    private \PDO $db;
    private CommentsRepository $commentsRepository;

    function __construct(\PDO $db, CommentsRepository $commentsRepository)
    {
        $this->db = $db;
        $this->commentsRepository = $commentsRepository;
    }

    public function existsComment(int $id): bool
    {
        return $this->commentsRepository->exists($id);
    }

    function savecomment(Comments $comments)
    {
        if (!$this->UserCommited($comments->getIduser(), $comments->getIdrecipes())) {
            throw new BuildExceptions("Por favor, usted ya ha comentado en esta receta.");
        }
        $this->commentsRepository->save($comments);
    }

    function getallcomment(): array
    {
        return $this->commentsRepository->getall();
    }

    function getCommentsByIdRecipe(int $idrecipe): array
    {
        return $this->commentsRepository->getCommentsByIdRecipe($idrecipe);
    }

    public function UserCommited(int $iduser, int $idrecipe): bool
    {
        return $this->commentsRepository->getCommentsByIdUser($iduser, $idrecipe);
    }

}