<?php

namespace App\Celifind\Entities;

use App\Celifind\Checks\ChecksProduct;
use App\Celifind\Exceptions\BuildExceptions;

class Subcategory
{
    protected ?int $id = null;
    protected string $name;
    protected string $description;
    protected ?int $idcategoria = null;

    public function __construct($id, $name, $description, $idcategoria)
    {
        $error = 0;
        $this->id = $id;
        if (($error = $this->setName($name)) != 0) {
            $_SESSION['errors']['name'] = ChecksProduct::getErrorMessage($error);
        }

        if (($error = $this->setDescription($description)) != 0) {
            $_SESSION['errors']['description'] = ChecksProduct::getErrorMessage($error);
        }

        $this->idcategoria = $idcategoria;
        if (!empty($_SESSION['errors'])) {
            $errorMessage = json_encode($_SESSION['errors']);
            throw new BuildExceptions($errorMessage);
        }
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

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $errorNull = ChecksProduct::minMaxLength($description, 3, 100);
        if ($errorNull != 0) {
            return $errorNull;
        }

        $errorWord = ChecksProduct::validateProductWords($description);
        if ($errorWord != 0) {
            return $errorWord;
        }

        $errorNotNumber = ChecksProduct::validateProductNotNumber($description);
        if ($errorNotNumber != 0) {
            return $errorNotNumber;
        }

        $this->description = $description;
        return 0;
    }

    public function getIdcategoria()
    {
        return $this->idcategoria;
    }

    public function setIdcategoria($idcategoria)
    {
        $this->idcategoria = $idcategoria;

        return $this;
    }
}
