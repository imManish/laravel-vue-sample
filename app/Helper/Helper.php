<?php

/**
 * @method generate OTp
 *
 * @return 4 digit
 *
 * @param $digit
 */
if (!function_exists('generateOTP')) {
    function generateOTP($digit = 4)
    {
        $i = 0; //counter
        $pin = ''; //our default pin is blank.
        while ($i < $digit) {
            //generate a random number between 0 and 9.
            $pin .= mt_rand(0, 9);
            ++$i;
        }

        return $pin;
    }
}
if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 10)
    {
        return mb_substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / mb_strlen($x)))), 1, $length);
    }
}

/* if (($role->role_alias == 'business' || $role->role_alias == 'provider') && ($role->id == $value) && empty(request('business_latitude'))) {
$newmessage = $this->businessMessage('Business Latitude');
$this->businessRole($newmessage, $value, 'business_latitude');

return false;
} elseif (($role->role_alias == 'business' || $role->role_alias == 'provider') && ($role->id == $value) && empty(request('business_latitude'))) {
$businessLatitudeValidation = new BusinessLatitudeValidation();
$validate = $businessLatitudeValidation->passes('business_latitude', request('business_latitude'));
if ($validate != 1) {
$this->message = $businessLatitudeValidation->message();

return false;
}
}
if (($role->role_alias == 'business' || $role->role_alias == 'provider') && ($role->id == $value) && empty(request('business_longitude'))) {
$newmessage = $this->businessMessage('Business Longitude');
$this->businessRole($newmessage, $value, 'business_longitude');

return false;
} elseif (($role->role_alias == 'business' || $role->role_alias == 'provider') && ($role->id == $value) && !empty(request('business_longitude'))) {
$businessLogitudeValidation = new BusinessLogitudeValidation();
$validate = $businessLogitudeValidation->passes('business_longitude', request('business_longitude'));
if ($validate != 1) {
$this->message = $businessLogitudeValidation->message();

return false;
}
}*/
