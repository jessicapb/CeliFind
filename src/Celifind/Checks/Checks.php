<?php
namespace App\Celifind\Checks;

// Los códigos bueno son el 1, y los malos son el 0
abstract class Checks{
    public static function notNullNotEmptyTrimmed($n){
        if($n != null && !empty($n)){
            $nClean = trim($n);
            if(strlen($nClean) > 0) { 
                return 0; 
            } else { 
                return -1; 
            }
        }else {
            return -1;
        }
    }

    public static function minMax($string,$min,$max){
        $result = Checks::notNullNotEmptyTrimmed($string);
        if($result === 0){
            if (strlen($string)<$min) return -2;
            if (strlen($string)>$max) return -3;
            return 0;
        }
        return $result;
    }

    public static function getErrorMessage($e) {
        return match ($e) {
            0 => $e,
            -1 => "El camp no pot estar buit o amb espais.",
            -2 => "El camp ha de complir un mínim de caràcters.",
            -3 => "Heu superat el límit de caràcters.",
            default => "Error desconocido",
        };
    }
}