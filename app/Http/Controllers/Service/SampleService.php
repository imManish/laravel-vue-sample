<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Common\CommonService;
use App\Http\Controllers\Common\RoleController;
use App\Http\Controllers\Controller;

class Sample extends Controller
{
    /**
     * Register Driver Method.
     *
     * @param $data input
     *
     * @return $array object
     */
    public function registerDriver($data)
    {
        // Input data Parsing from Request
        // code ..

        $requested_role = $user_role->role_alias;
        $insertdatabase_common = new CommonService();

        // Common Insert method class Common
        $success = $insertdatabase_common->insertIntoUserOtp($requested_role, $input);

        return $success;
    }
}
