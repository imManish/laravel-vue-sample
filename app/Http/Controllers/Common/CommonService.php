<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\BusinessService;
use App\Jobs\SendEmailJob;
use App\Jobs\SendVerificationJob;
use App\Otp;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonService extends Controller
{
    /**
     * @return $success
     *
     * @param $request
     */
    public function loginService($input)
    {
        $data = ['email' => $input['email'], 'password' => $input['password']];
        $success['success'] = true;
        return $success;
    }

    /**
     * @param request Email
     *
     * @return email sent
     */
    public function forgotService($input = '')
    {
        //code ..

        return $success;
    }

    /**
     * @param userdetails
     *
     * @return register user
     */
    public function registerUser($data = '')
    {
        //code ..
        $input = $data;
        // Common Insert method
        $success = $this->insertIntoUserOtp($requested_role, $input);

        return $success;
    }

}
