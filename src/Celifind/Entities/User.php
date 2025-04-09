<?php

namespace App\Celifind\Entities;

use App\Celifind\Checks\Checks;
use App\Celifind\Checks\ChecksUser;
use App\Celifind\Exceptions\BuildExceptions;

class User
{
    // The others fields shouldnt even being created due to database handling
    protected $name;
    protected $surname;
    protected $email;
    protected $city;
    protected $postalcode;
    protected $password;



    public function __construct($name, $surname, $email, $city, $postalcode, $password)
    {
        $error = 0;
        if (($error = $this->setName($name)) != 0) {
            $_SESSION['errors']['name'] = Checks::getErrorMessage($error);
        }
        if (($error = $this->setSurname($surname)) != 0) {
            $_SESSION['errors']['surname'] = Checks::getErrorMessage($error);
        }
        if (($error = $this->setEmail($email)) != 0) {
            $_SESSION['errors']['email'] = ChecksUser::getErrorMessage($error);
        }
        if (($error = $this->setCity($city)) != 0) {
            $_SESSION['errors']['city'] = Checks::getErrorMessage($error);
        }
        if (($error = $this->setPostalCode($postalcode)) != 0) {
            $_SESSION['errors']['postalcode'] = ChecksUser::getErrorMessage($error);
        }
        if (($error = $this->setPassword($password)) != 0) {
            $_SESSION['errors']['password'] = ChecksUser::getErrorMessage($error);
        }
        if (!empty($_SESSION['errors'])) {
            throw new BuildExceptions("It is not possible to create the user. Check errors.");
        }
    }

    // Getters
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
        $error = ChecksUser::minMaxLength($name,3,20);
        if ($error === 0) {
            $this->name = $name;
            return 0;
        } else {
            return $error;
        }
    }

    public function setSurname($surname)
    {
        $error = ChecksUser::minMaxLength($surname,3,20);
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
    }

    public function setCity($city)
    {
        $error = ChecksUser::minMaxLength($city,2,20); // El más corto es Òs, y el mas largo Santa Maria de Merlès, con 20 caracteres en total.
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
        if($error ===0){
            $this->postalcode = $postalcode;
        }else{
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
