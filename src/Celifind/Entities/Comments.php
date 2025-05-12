<?php

namespace App\Celifind\Entities;

use App\Celifind\Checks\ChecksProduct;
use App\Celifind\Exceptions\BuildExceptions;

class Comments{
    protected ?int $id = null;
    protected string $description;
    protected ?int $idrecipes = null;
    protected ?int $iduser = null; 

    public function __construct(?int $id, string $description, ?int $idrecipes, ?int $iduser)
    {
        $error = 0;
        $this->id = $id;
        if (($error = $this->setDescription($description)) != 0) {
            $_SESSION['errors']['description'] = ChecksProduct::getErrorMessage($error);
        }

        $this->idrecipes = $idrecipes;
        $this->iduser = $iduser;

        if (!empty($_SESSION['errors'])) {
            $errorMessage = json_encode($_SESSION['errors']);
            throw new BuildExceptions($errorMessage);
        }
    }
    
    public function getDescription(): string{
        return $this->description;
    }

    public function setDescription($description): int{
        $errorNull = ChecksProduct::minMaxLength($description, 4, 1060);
        if($errorNull !=0){
            return $errorNull;       
        }
        
        $errorWord = ChecksProduct::validateProductWords($description);
        if($errorWord !=0){
            return $errorWord;
        }
        
        $errorNotNumber = ChecksProduct::validateProductNotNumber($description);
        if($errorNotNumber !=0){
            return $errorNotNumber;
        }
        
        $this->description = $description;
        return 0; 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): int
    {
        $this->id = $id;
        return 0;
    }

    public function getIdrecipes(): ?int
    {
        return $this->idrecipes;
    }

    public function setIdrecipes(?int $idrecipes): int
    {
        $this->idrecipes = $idrecipes;
        return 0;
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function setIduser(?int $iduser): int
    {
        $this->iduser = $iduser;
        return 0;
    }
}

?>