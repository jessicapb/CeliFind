<?php

namespace App\Celifind\Entities;

use App\Celifind\Checks\Checks;
use App\Celifind\Checks\ChecksUser;
use App\Celifind\Exceptions\BuildExceptions;

class User
{
    // The others fields shouldnt even being created due to database handling
    protected ?int $id = null;
    public $name;
    public $surname = null;
    public $email;
    public $city = null;
    public $postalcode;
    public $password;
    public $status = 1; // 1 = active, 2 = admin, 3 = banned

    /**
     * Constructor para crear un usuario nuevo (valida los datos)
     */
    public function __construct($name, $email, $postalcode, $password, $surname = null, $city = null, $status = 1)
    {
        $error = 0;
        if (($error = $this->setName($name)) != 0) {
            $_SESSION['errors']['name'] = Checks::getErrorMessage($error);
        }
        // surname puede ser null
        if ($surname !== null && ($error = $this->setSurname($surname)) != 0) {
            $_SESSION['errors']['surname'] = Checks::getErrorMessage($error);
        } else if ($surname === null) {
            $this->surname = null;
        }
        if (($error = $this->setEmail($email)) != 0) {
            $_SESSION['errors']['email'] = ChecksUser::getErrorMessage($error);
        }
        // city puede ser null
        if ($city !== null && ($error = $this->setCity($city)) != 0) {
            $_SESSION['errors']['city'] = Checks::getErrorMessage($error);
        } else if ($city === null) {
            $this->city = null;
        }
        if (($error = $this->setPostalCode($postalcode)) != 0) {
            $_SESSION['errors']['postalcode'] = ChecksUser::getErrorMessage($error);
        }
        if (($error = $this->setPassword($password)) != 0) {
            $_SESSION['errors']['password'] = ChecksUser::getErrorMessage($error);
        }

        $this->status = $status; // No validation, since there is no backoffice to pply it with

        if (!empty($_SESSION['errors'])) {
            $errorMessage = json_encode($_SESSION['errors']);
            throw new BuildExceptions($errorMessage);
        }
    }

    /**
     * Crea un usuario a partir de los datos de la base de datos (sin validar)
     */
    public static function fromDbRow($id, $name, $surname, $email, $city, $postalcode, $password)
    {
        $user = new self('', '', '', '', '', ''); // No valida nada
        $user->id = $id;
        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;
        $user->city = $city;
        $user->postalcode = $postalcode;
        $user->password = $password;
        return $user;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getSurname()
    {
        return $this->surname;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function getPostalcode()
    {
        return $this->postalcode;
    }
    public function getPassword()
    {
        return $this->password;
    }

    // Setters
    public function setName($name)
    {
        $error = ChecksUser::minMaxLength($name, 3, 20);
        if ($error === 0) {
            $this->name = $name;
            return 0;
        } else {
            return $error;
        }
    }

    public function setSurname($surname)
    {
        $error = ChecksUser::minMaxLength($surname, 3, 20);
        if ($error === 0) {
            $this->surname = $surname;
            return 0;
        } else {
            return $error;
        }
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return 0;
    }

    public function setCity($city)
    {
        $error = ChecksUser::minMaxLength($city, 2, 20); // El más corto es Òs, y el mas largo Santa Maria de Merlès, con 20 caracteres en total.
        if ($error === 0) {
            $this->city = $city;
            return 0;
        } else {
            return $error;
        }
    }

    public function setPostalcode($postalcode)
    {
        $error = ChecksUser::correctPostalCode($postalcode);
        if ($error === 0) {
            $this->postalcode = $postalcode;
            return 0;
        } else {
            return $error;
        }
    }

    public function setPassword($password)
    {
        $error = ChecksUser::checkPass($password);
        if ($error === 0) {
            $this->password = $password;
            return 0;
        } else {
            return $error;
        }
    }
}
