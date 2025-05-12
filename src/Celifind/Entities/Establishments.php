<?php
namespace App\Celifind\Entities;

use App\Celifind\Checks\ChecksProduct;
use App\Celifind\Exceptions\BuildExceptions;

class Establishments{
    protected ?int $id = null;
    protected string $name;
    protected string $description;
    protected string $location;
    protected string $phonenumber;
    protected string $website;
    protected string $schedule;
    protected string $image;
    
    public function __construct(?int $id = null, string $name, string $description, string $location, string $phonenumber, string $website, string $schedule, string $image){
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
        
        if (($error = $this->setPhonenumber($phonenumber)) != 0){
            $_SESSION['errors']['phonenumber'] = ChecksProduct::getErrorMessage($error);
        }
        
        if (($error = $this->setWebsite($website)) != 0){
            $_SESSION['errors']['website'] = ChecksProduct::getErrorMessage($error);
        }
        
        if(($error = $this->setSchedule($schedule)) !=0){
            $_SESSION['errors']['schedule'] = ChecksProduct::getErrorMessage($error);
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
        
        $this->location = $location;
        return 0; 
    }
    
    //PhoneNumber
    public function getPhoneNumber(): string{
        return $this->phonenumber;
    }
    
    public function setPhonenumber(string $phonenumber): int{
        $errorNull = ChecksProduct::minMaxLength($phonenumber, 4, 1060);
        if($errorNull !=0){
            return $errorNull;       
        }
        
        $errorWord = ChecksProduct::validateProductWords($phonenumber);
        if($errorWord !=0){
            return $errorWord;
        }
        
        $errorPatternPhone = ChecksProduct::validatePhoneNumber($phonenumber);
        if($errorPatternPhone !=0){
            return $errorPatternPhone;
        }
        
        $this->phonenumber = $phonenumber;
        return 0; 
    }
    
    // Website
    public function getWebsite(): string{
        return $this->website;
    }
    
    public function setWebsite(string $website): int{
        $errorNull = ChecksProduct::minMaxLength($website, 4, 1060);
        if($errorNull !=0){
            return $errorNull;       
        }
        
        $errorWord = ChecksProduct::validateProductWords($website);
        if($errorWord !=0){
            return $errorWord;
        }
        
        $errorPatternURL = ChecksProduct::validateURL($website);
        if($errorPatternURL !=0){
            return $errorPatternURL;
        }
        
        $this->website = $website;
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
        
        $this->schedule = $schedule;
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