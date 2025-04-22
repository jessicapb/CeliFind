<?php

namespace App\Celifind\Checks;
use App\Celifind\Checks\Checks;

class ChecksProduct extends Checks{
    public static function minMaxNull($min,$max){
        if ($string === null) {
            return 0; 
        }
        if (strlen($string)<$min) return -2;
        if (strlen($string)>$max) return -3;
    }
    
    // Function to validate wrong words
    public static function validateProductWords($string) {
        $forbiddenWords = [
            'mala', 'prohibida', 'bloqueada', 
            'maldito', 'imbécil', 'idiota',
            'racista', 'homofóbico', 'xenofóbico',
            'trigo', 'cebada', 'centeno','triticale','hojuelas de avena',
            'ordi', 'sègol', 'triticale', 'fulles de civada' ,
            'trigo candeal', 'escaña', 'farro', 'kamut', 'espelta',
            'escanya',
        ];
        $words = strtolower($string);
        $errors = [];
        foreach ($forbiddenWords as $word) {
            if (strpos($words, $word) !== false) {
                $_SESSION['forbidden_word'] = $word;
                return -5;
            }
        }
        return 0;
    }
    
    // Function to validate pattern for price
    public static function validatePrice($price){
        $pricePattern = '/^\d+([,.]\d{2})€$/';
        if (!preg_match($pricePattern, $price)) {
            return -6;
        }
        return 0;
    }
    
    // Function to validate not number
    public static function validateProductNotNumber($string){
        $NotNumberPattern = '/\d/';
        if (preg_match($NotNumberPattern, $string)){
            return -7;
        }
        return 0;
    }
    
    // Function to validate pattern for weight
    public static function validateWeight($weight){
        $weightPatron = '/^\d{2,4}g$/';
        if (!preg_match($weightPatron, $weight)){
            return -8;
        }
        return 0;
    }
    
    // Function to validate pattern for people
    public static function validatePeople($people){
        $peoplePattern = '/^\d{1,2}\spersones$/'; 
        if (!preg_match($peoplePattern, $people)){
            return -9;
        }
        return 0;
    }
    
    // Function to validate pattern for duration
    public static function validateDuration($duration){
        $durationPattern = '/^\d{1,3}-\d{1,3}min$|^\d{1,3}min$/';
        if (!preg_match($durationPattern, $duration)){
            return -10;
        }
        return 0;
    }
    
    public static function getErrorMessage($e) {
        $word = '';
        if (isset($_SESSION['forbidden_word'])) {
            $word = $_SESSION['forbidden_word']; 
        }
        return match ($e) {
            0 => $e,
            -1 => "El camp no pot ser null.",
            -2 => "El camp no pot estar buit.",
            -3 => "El camp ha de complir un mínim de caràcters.",
            -4 => "Heu superat el límit de caràcters.",
            -5 => "El camp té lletres no permeses: " .$word ,
            -6 => "El preu és incorrecte. Exemple: 12.34€ o 12,34€.",
            -7 => "El camp té números quan hauria de ser lletres.",
            -8 => "L'estructura del camp és incorrecta. Exemple: 125g.",
            -9 => "L'estructura del camp és incorrecta. Exemple: 8 persones o 15 persones",
            -10 => "L'estructura del camp és incorrecta. Exemple: 115-120min o 30min",
            default => "Error desconegut",
        };
    }
}