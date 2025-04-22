<?php

namespace App\Celifind\Entities;

use App\Celifind\Checks\ChecksProduct;
use App\Celifind\Exceptions\BuildExceptions;

class Recipes{
    protected ?int $id = null;
    protected string $name;
    protected string $description;
    protected string $ingredients;
    protected string $people;
    protected string $duration;
    protected string $instruction;
    protected string $image;
    
    public function __construct(?int $id = null, string $name, string $description, string $ingredients, string $people, string $duration, string $instruction, string $image){
        $error = 0;
        
        $this->id = $id;
        if(($error = $this->setName($name)) !=0){
            $_SESSION['errors']['name'] = ChecksProduct::getErrorMessage($error);
        }
        
        if(($error = $this->setDescription($description)) !=0){
            $_SESSION['errors']['description'] = ChecksProduct::getErrorMessage($error);
        }
        
        if (($error = $this->setIngredients($ingredients)) != 0){
            $_SESSION['errors']['ingredients'] = ChecksProduct::getErrorMessage($error);
        }
        
        if (($error = $this->setPeople($people)) != 0){
            $_SESSION['errors']['people'] = ChecksProduct::getErrorMessage($error);
        }
        
        if (($error = $this->setDuration($duration)) != 0){
            $_SESSION['errors']['duration'] = ChecksProduct::getErrorMessage($error);
        }
        
        if (($error = $this->setInstruction($instruction)) != 0){
            $_SESSION['errors']['instruction'] = ChecksProduct::getErrorMessage($error);
        }
        
        if (($error = $this->setImage($image)) != 0){
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
    
    public function setName(string $name):int  {
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
    
    // Ingredients
    public function getIngredients(): string{
        return $this->ingredients;
    }
    
    public function setIngredients(string $ingredients):int {
        $errorNull = ChecksProduct::minMaxLength($ingredients, 4, 1060);
        if($errorNull !=0){
            return $errorNull;       
        }
        
        $errorWord = ChecksProduct::validateProductWords($ingredients);
        if($errorWord !=0){
            return $errorWord;
        }
        
        $this->ingredients = $ingredients;
        return 0;
    }
    
    // People
    public function getPeople():string{
        return $this->people;
    }
    
    public function setPeople($people):int{
        $errorNull = ChecksProduct::minMaxLength($people, 2, 30);
        if($errorNull !=0){
            return $errorNull;       
        }
        
        $errorPattern = ChecksProduct::validatePeople($people);
        if($errorPattern  !=0){
            return $errorPattern;
        }
        
        $this->people = $people;
        return 0;
    }
    
    // Duration
    public function getDuration():string{
        return $this->duration;
    }
    
    public function setDuration($duration):int{
        $errorNull = ChecksProduct::minMaxLength($duration, 2, 20);
        if($errorNull !=0){
            return $errorNull;       
        }
        
        $errorPattern = ChecksProduct::validateDuration($duration);
        if($errorPattern !=0){
            return $errorPattern;
        }
        
        $this->duration = $duration;
        return 0;
    }
    
    // Instruction
    public function getInstruction():string{
        return $this->instruction;
    }
    
    public function setInstruction($instruction):int {
        $errorNull = ChecksProduct::minMaxLength($instruction, 4, 1060);
        if($errorNull !=0){
            return $errorNull;       
        }
        
        $errorWord = ChecksProduct::validateProductWords($instruction);
        if($errorWord !=0){
            return $errorWord;
        }
        
        $this->instruction = $instruction;
        return 0;
    }
    
    // Image
    public function getImage():string{
        return $this->image;
    }
    
    public function setImage($image):int{
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
    
    // Con esta función convierto la imagen a base64
    // Después la convertimos en una ruta
    // Si NO hay imagen, mensaje de error
    public function getBase64() {        
        if ($this->image) {
            $base64Image = base64_encode($this->image);
            $imageType = 'image/png';
            return "data:$imageType;base64,$base64Image";
        } else {
            echo "Imatge no trobada";
        }
    }
}
