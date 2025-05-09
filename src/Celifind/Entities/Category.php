<?php

namespace App\Celifind\Entities;

use App\Celifind\Checks\ChecksProduct;
use App\Celifind\Exceptions\BuildExceptions;

class Category
{
    protected ?int $id = null;
    protected string $name;
    protected string $description;
    protected string $image;

    public function __construct($id, $name, $description, $image)
    {
        $error = 0;

        $this->id = $id;
        if (($error = $this->setName($name)) != 0) {
            $_SESSION['errors']['name'] = ChecksProduct::getErrorMessage($error);
        }
        if (($error = $this->setDescription($description)) != 0) {
            $_SESSION['errors']['description'] = ChecksProduct::getErrorMessage($error);
        }
        if (($error = $this->setImage($image)) != 0) {
            $_SESSION['errors']['image'] = ChecksProduct::getErrorMessage($error);
        }

        if (!empty($_SESSION['errors'])) {
            $errorMessage = json_encode($_SESSION['errors']);
            throw new BuildExceptions($errorMessage);
        }
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

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $errorWord = ChecksProduct::notEmpty($image);
        if ($errorWord != 0) {
            return $errorWord;
        }
        $this->image = $image;
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

    /* Convert an image to a base64-encoded string */
    public function getBase64()
    {
        if ($this->image) {
            $base64Image = base64_encode($this->image);
            $imageType = 'image/*';
            echo '<img src="data:' . $imageType . ';base64,' . $base64Image . '" />';
        } else {
            echo "Imagen no encontrada";
        }
    }
}
