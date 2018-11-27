<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class UserValidation implements Rule
{
    protected $message = 'Invalid Email Address!';

    /**
     * Create a new rule instance.
     */
    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        Log::info($attribute.'-'.$value);
        try {
            Log::info('--checking mobile number');
            if ((empty($value) && !empty(request('mobile_number')))) {
                return true;
            } elseif (!empty($value) && !empty(request('mobile_number'))) {
                return true;
            } elseif (!empty($value) && empty(request('mobile_number'))) {
                $this->message = 'Mobile Number Required!';
                $attribute = 'mobile_number';
                $this->message = json_encode(['key' => $attribute, 'message' => $this->message]);

                return false;
            }
        } catch (Exception $e) {
            Log::info('--checking mobile number');
            Log::info('--checking mobile number'.$e->getMessage());
        }

        $this->message = json_encode(['key' => $attribute, 'message' => $this->message]);

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
