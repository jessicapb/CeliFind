<?php

namespace App\Celifind\Entities;

use App\Celifind\Checks\ChecksProduct;
use App\Celifind\Exceptions\BuildExceptions;

class Comments{
    protected ?int $id = null;
    protected string $name;
    protected string $description;
    protected ?int $idrecipes = null;
    protected ?int $iduser = null; 

    public function __construct(?int $id, string $name, string $description, ?int $idrecipes, ?int $iduser)
    {
        $error = 0;
        $this->id = $id;

        if (($error = $this->setName($name)) != 0) {
            $_SESSION['errors']['name'] = ChecksProduct::getErrorMessage($error);
        }
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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getIdrecipes()
    {
        return $this->idrecipes;
    }

    public function setIdrecipes($idrecipes)
    {
        $this->idrecipes = $idrecipes;
        return $this;
    }

    public function getIduser()
    {
        return $this->iduser;
    }

    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $errorNull = ChecksProduct::minMaxLength($name, 3, 50);
        if ($errorNull != 0) {
            return $errorNull;
        }

        $errorWord = ChecksProduct::validateProductWords($name);
        if ($errorWord != 0) {
            return $errorWord;
        }

        $errorNotNumber = ChecksProduct::validateProductNotNumber($name);
        if ($errorNotNumber != 0) {
            return $errorNotNumber;
        }

        $this->name = $name;
        return 0;
    }
}

?>