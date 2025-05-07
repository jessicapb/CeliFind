<?php
namespace App\Celifind\Entities;

use App\Celifind\Checks\ChecksProduct;
use App\Celifind\Exceptions\BuildExceptions;

class Establishments{
    protected ?int $id = null;
    protected string $name;
    protected string $description;
    protected string $location;
    protected string $schedule;
    protected string $letter;
    protected string $image;
    
    public function __construct(?int $id = null, string $name, string $description, string $location, string $schedule, string $letter, string $image){
        $error = 0;
        
        $this->id = $id;
        if(($error = $this->setName($name)) !=0){
            $_SESSION['errors']['name'] = ChecksProduct::getErrorMessage($error);
        }
        
        if(($error = $this->setDescription($description)) !=0){
            $_SESSION['errors']['description'] = ChecksProduct::getErrorMessage($error);
        }
        
        if (($error = $this->setLocation($location)) != 0){
            $_SESSION['errors']['location'] = ChecksProduct::getErrorMessage($error);
        }
        
        if(($error = $this->setSchedule($schedule)) !=0){
            $_SESSION['errors']['schedule'] = ChecksProduct::getErrorMessage($error);
        }
        
        if(($error = $this->setLetter($letter)) !=0){
            $_SESSION['errors']['letter'] = ChecksProduct::getErrorMessage($error);
        }
        
        if(($error = $this->setImage($image)) !=0){
            $_SESSION['errors']['image'] = ChecksProduct::getErrorMessage($error);
        }
        
        if (!empty($_SESSION['errors'])) {
            $errorMessage = json_encode($_SESSION['errors']);
            throw new BuildExceptions($errorMessage);
        }
    }
    
    // Name
    public function getName(): string{
        return $this->name;
    }
    
    public function setName(string $name):int {
        $errorNull = ChecksProduct::minMaxLength($name, 3, 150);
        if($errorNull !=0){
            return $errorNull;       
        }
        
        $errorWord = ChecksProduct::validateProductWords($name);
        if($errorWord !=0){
            return $errorWord;
        }
        
        $errorNotNumber = ChecksProduct::validateProductNotNumber($name);
        if($errorNotNumber !=0){
            return $errorNotNumber;
        }
        
        $this->name = $name;
        return 0; 
    }
    
    // Description
    public function getDescription(): string{
        return $this->description;
    }
    
    public function setDescription(string $description):int {
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
    
    // Location
    public function getLocation(): string{
        return $this->location;
    }
    
    public function setLocation(string $location): int{
        $errorNull = ChecksProduct::minMaxLength($location, 4, 1060);
        if($errorNull !=0){
            return $errorNull;       
        }
        
        $errorWord = ChecksProduct::validateProductWords($location);
        if($errorWord !=0){
            return $errorWord;
        }
        
        $errorNotNumber = ChecksProduct::validateProductNotNumber($location);
        if($errorNotNumber !=0){
            return $errorNotNumber;
        }
        
        $this->location = $location;
        return 0; 
    }
    
    // Schedule
    public function getSchedule(): string{
        return $this->schedule;
    }
    
    public function setSchedule(string $schedule): int{
        $errorNull = ChecksProduct::minMaxLength($schedule, 4, 1060);
        if($errorNull !=0){
            return $errorNull;       
        }
        
        $errorWord = ChecksProduct::validateProductWords($schedule);
        if($errorWord !=0){
            return $errorWord;
        }
        
        $errorNotNumber = ChecksProduct::validateProductNotNumber($schedule);
        if($errorNotNumber !=0){
            return $errorNotNumber;
        }
        
        $this->schedule = $schedule;
        return 0; 
    }
    
    // Letter
    public function getLetter(): string{
        return $this->letter;
    }
    
    public function setLetter(string $letter): int{
        $errorNull = ChecksProduct::minMaxLength($letter, 4, 1060);
        if($errorNull !=0){
            return $errorNull;       
        }
        
        $errorWord = ChecksProduct::validateProductWords($letter);
        if($errorWord !=0){
            return $errorWord;
        }
        
        $errorNotNumber = ChecksProduct::validateProductNotNumber($letter);
        if($errorNotNumber !=0){
            return $errorNotNumber;
        }
        
        $this->letter = $letter;
        return 0; 
    }
    
    // Image
    public function getImage() {
        if (!empty($this->image)) {
            return $this->image;
        } else {
            return '/img/default.png';
        }
    }
    
    public function setImage($image){
        $errorNull = ChecksProduct::notEmpty($image);
        if ($errorNull != 0) {
            return $errorNull;
        }
        $this->image = $image;
        return 0;
    }
    
    // Id
    public function getId(): ?int{
        return $this->id;
    }
    
    public function setId(?int $id): int{
        $this->id = $id;
        return 0;
    }
}