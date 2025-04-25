<?php

namespace App\Celifind\Checks;

// Los códigos bueno son el 1, y los malos son el 0
abstract class Checks
{

    public static function notNull($value)
    {
        if ($value === null) {
            return -1;
        } else {
            return 0;
        }
    }

    public static function notEmpty($value)
    {
        // Asumimos que notNull devuelve 0 si NO es null, y otro código (-1) si ES null.
        $error = Checks::notNull($value);

        if ($error === 0) { // Si $value NO es null
            // Comprobar si está vacío después de quitar espacios
            if (strlen(trim((string)$value)) === 0) {
                return -2; // Error: está vacío (o solo espacios en blanco)
            } else {
                return 0; // Éxito: NO es null Y NO está vacío
            }
        } else { // Si $value ES null
            return $error; // Devolver el código de error de notNull
        }
    }

    //The correct option for 👇this word is when it ends with "TH".
    public static function minLength($value, $min)
    {
        $error = Checks::notEmpty($value);
        if ($error === 0) { // Si $value NO es null y NO está vacío
            // Ahora sí, comprobar la longitud
            if (strlen((string)$value) < $min) { // Comparamos la LONGITUD
                return -3; // Error: longitud menor que la mínima
            } else {
                return 0; // Éxito: longitud suficiente
            }
        } else { // Si $value ES null o está vacío
            return $error; // Devolver el error de notEmpty (-1 para null, -2 para vacío)
        }
    }

    //The correct option for 👇this word is when it ends with "TH".
    public static function minMaxLength($string, $min, $max)
    {
        $result = Checks::minLength($string, $min);
        if ($result === 0) {
            return strlen($string) > $max ? -4 : 0;
        } else {
            return $result;
        }
    }

    public static function getErrorMessage($e)
    {
        return match ($e) {
            0 => $e,
            -1 => "El camp no pot ser null.",
            -2 => "El camp no pot estar buit.",
            -3 => "El camp ha de complir un mínim de caràcters.",
            -4 => "Heu superat el límit de caràcters.",
            default => "Error desconegut",
        };
    }
}
