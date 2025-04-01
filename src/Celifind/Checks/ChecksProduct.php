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
    
    // Function to validate equal words
    /*public static function RepeatedWord($string) {
        if ($string === null || $string === '') {
            return 0; 
        }
        
        $wordscorrect = ['carrefour','mercadona','schar', 'corte inglés','sense gluten, sense llet afegida, sense ou afegit, vegetarià, sense conservants, sense blat, sense lactosa, vegà, sense oli de palma'];
        
        if(in_array($string, $wordscorrect)){
            return 0;
        }
        
        $phrase = strtolower($string);
        
        if (strlen($phrase) <= 3) {
            return -5;
        }
        
        for ($i = 0; $i < strlen($phrase) - 1; $i++) {
            if ($phrase[$i] === $phrase[$i + 1]) {
                return -5; 
            }
        }
        return 0; 
    }*/
    
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
            return -9;
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
            -5 => "El camp té lletres repetides o símbols sense sentit.",
            -6 => "El preu és incorrecte. Exemple: 12.34€ o 12,34€.",
            -7 => "El camp té números o símbols quan hauria de ser lletres.",
            -8 => "L'estructura del camp és incorrecta. Exemple: paraula, paraula. o paraula paraula, paraula.",
            -9 => "L'estructura del camp és incorrecta. Exemple: 125g.",
            default => "Error desconocido",
        };
    }
}