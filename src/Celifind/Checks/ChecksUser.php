<?php

namespace App\Celifind\Checks;

use App\Celifind\Checks\Checks;

class ChecksUser extends Checks
{


    public static function checkPass($password)
    {
        $error = Checks::minMaxLength($password, 6, 15);
        if ($error !== 0) return $error;
        if ($error === 0) return 0;
    }


    public static function correctPostalCode($postalCode)
    {
        $error = Checks::notEmpty($postalCode);
        if ($error === 0) {
            if (preg_match('/^[0-5][0-9]{4}$/', $postalCode)) {
                return 0;
            } else {
                return -102;
            }
        }
    }

    public static function correctEmail($email){
        $error = Checks::notEmpty($email);
        if($error ===0){
            
        }
    }

}
