<?php

namespace App\Celifind\Checks;

use App\Celifind\Checks\Checks;

class ChecksUser extends Checks
{


    public static function checkPass($password)
    {
        $error = Checks::minMaxLength($password, 6, 30);
        if ($error !== 0) {
            return $error;
        }
        if ($error === 0) return 0;
    }

    /**
     * Check if the postal code is valid.
     * @param string $postalCode The postal code to check.
     * @return int 0 if valid, -102 if invalid.
     * @throws \Exception If the postal code is empty.
     * @throws \Exception If the postal code is not a string.
     * @throws \Exception If the postal code does not match the pattern.
     */
    public static function correctPostalCode($postalCode)
    {
        $error = Checks::notEmpty($postalCode);
        if ($error === 0) {
            if (preg_match('/^[0-5][0-9]{4}$/', $postalCode)) {
                return 0;
            } else {
                return -102; // Invalid postal code
            }
        } else {
            return $error; // Error from notEmpty
        }
    }

    public static function correctEmail($email)
    {
        $error = Checks::notEmpty($email);
        if ($error === 0) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return 0;
            } else {
                return -103; // Email no válido
            }
        } else {
            return $error; // Error de notEmpty
        }
    }

    public static function getErrorMessage($e)
    {
        return match ($e) {
            0 => $e,
            -102 => "El codi postal no és vàlid.",
            -103 => "El correu electrònic no és vàlid.",
            default => "Error desconegut",
        };
    }
}
