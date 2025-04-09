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
                return -4;
            }
        }
        return 0;
    }
    
    // Function to validate pattern for price
    public static function validatePrice($price){
        $pricePattern = '/^\d+([,.]\d{2})€$/';
        if (!preg_match($pricePattern, $price)) {
            return -5;
        }
        return 0;
    }
    
    // Function to validate not number
    public static function validateProductNotNumber($string){
        $NotNumberPattern = '/\d/';
        if (preg_match($NotNumberPattern, $string)){
            return -6;
        }
        return 0;
    }

    // Function to validate pattern for weight
    public static function validateWeight($weight){
        $weightPatron = '/^\d{2,4}g$/';
        if (!preg_match($weightPatron, $weight)){
            return -7;
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
            -1 => "El camp no pot estar buit o amb espais.",
            -2 => "El camp ha de complir un mínim de caràcters." ,
            -3 => "Heu superat el límit de caràcters.",
            -4 => "El camp té lletres no permeses: " .$word ,
            -5 => "El preu és incorrecte. Exemple: 12.34€ o 12,34€.",
            -6 => "El camp té números quan hauria de ser lletres.",
            -7 => "L'estructura del camp és incorrecta. Exemple: 125g.",
            default => "Error desconegut",
        };
    }
}