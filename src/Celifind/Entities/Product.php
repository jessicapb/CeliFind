<?php
namespace App\Celifind\Entities;

use App\Celifind\Checks\Checks;
use App\Celifind\Checks\ChecksProduct;
use App\Celifind\Exceptions\BuildExceptions;

class Product{
    protected ?int $id = null;
    protected string $name;
    protected string $description;
    protected string $ingredients;
    protected string $nutritionalinformation;
    protected string $price;
    protected string $brand;
    protected string $image;
    protected string $weight;
    protected int $state;
    protected ?int $subcategory_id = null;

    public function __construct(?int $id = null, string $name, string $description, string $ingredients, string $nutritionalinformation, string $price, string $brand, string $image, string $weight, int $state, ?int $subcategory_id = null){
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
        
        if(($error = $this->setNutritionalInformation($nutritionalinformation)) !=0){
            $_SESSION['errors']['nutritionalinformation'] = ChecksProduct::getErrorMessage($error);
        }
        
        if(($error = $this->setPrice($price)) !=0){
            $_SESSION['errors']['price'] = ChecksProduct::getErrorMessage($error);
        }
        
        if(($error = $this->setBrand($brand)) !=0){
            $_SESSION['errors']['brand'] = ChecksProduct::getErrorMessage($error);
        }
        
        if(($error = $this->setImage($image)) !=0){
            $_SESSION['errors']['image'] = ChecksProduct::getErrorMessage($error);
        }
        
        if(($error = $this->setWeight($weight)) !=0){
            $_SESSION['errors']['weight'] = ChecksProduct::getErrorMessage($error);
        }
        
        if(($error = $this->setState($state)) !=0){
            $_SESSION['errors']['state'] = ChecksProduct::getErrorMessage($error);
        }
        $this->subcategory_id = $subcategory_id;

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
        $errorNull = ChecksProduct::minMax($name, 3, 150);
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
        $errorNull = ChecksProduct::minMax($description, 4, 1060);
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
        $errorNull = ChecksProduct::minMax($ingredients, 4, 1060);
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
    
    // Nutritional information
    public function getNutritionalInformation(): string{
        return $this->nutritionalinformation;
    }
    
    public function setNutritionalInformation(string $nutritionalinformation):int {
        $errorNull = ChecksProduct::minMaxNull($nutritionalinformation, 4, 1060);
        if($errorNull != 0){
            return $errorNull; 
        }
        
        $errorWord = ChecksProduct::validateProductWords($nutritionalinformation);
        if($errorWord !=0){
            return $errorWord;
        }
        
        $errorNotNumber = ChecksProduct::validateProductNotNumber($nutritionalinformation);
        if($errorNotNumber !=0){
            return $errorNotNumber;
        }
        
        $this->nutritionalinformation = $nutritionalinformation;
        return 0;
    }
    
    // Price
    public function getPrice(): string{
        return $this->price;
    }
    
    public function setPrice(string $price):int {
        $errorminmax = ChecksProduct::minMax($price, 2, 8);
        if($errorminmax != 0){
            return $errorminmax;
        }
        
        $errorpattern = ChecksProduct::validatePrice($price);
        if($errorpattern != 0){
            return $errorpattern;
        }
        
        $this->price = $price;
        return 0;
    }
    
    // Brand
    public function getBrand(): string{
        return $this->brand;
    }
    
    public function setBrand(string $brand):int {
        $errorNull = ChecksProduct::minMax($brand, 2, 140);
        if ($errorNull != 0) {
            return $errorNull; 
        }
        
        $errorWord = ChecksProduct::validateProductWords($brand);
        if($errorWord !=0){
            return $errorWord;
        }
        
        $errorNotNumber = ChecksProduct::validateProductNotNumber($brand);
        if($errorNotNumber !=0){
            return $errorNotNumber;
        }
        
        $this->brand = $brand;
        return 0;
    }
    
    // Image
    public function getImage(){
        return $this->image;
    }
    
    public function setImage($image){
        $errorNull = ChecksProduct::notNullNotEmptyTrimmed($image);
        if ($errorNull != 0) {
            return $errorNull;
        }
        $this->image = $image;
        return 0;
    }
    
    // Weight
    public function getWeight(): string{
        return $this->weight;
    }
    
    public function setWeight(string $weight):int{
        $errorNull = ChecksProduct::minMax($weight, 2, 5);
        if ($errorNull != 0) {
            return $errorNull;
        }
        
        $errorPattern = ChecksProduct::validateWeight($weight);
        if($errorPattern !=0){
            return $errorPattern;
        }
        $this->weight = $weight;
        return 0;
    }
    
    // State
    public function getState(): int{
        return $this->state;
    }
    
    public function setState(int $state):int {
        $this->state = $state;
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
    
    //SubCategoryId
    public function getSubCategoryId(): ?int {
        return $this->subcategory_id;
    }
    
    public function setSubategoryId(?int $subcategory_id): int {
        $this->subcategory_id = $subcategory_id;
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