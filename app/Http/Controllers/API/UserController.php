<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Common\CommonService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\BusinessService;
use App\Http\Controllers\Service\DriverService;
use App\Rules\BusinessAddressValidation;
use App\Rules\BusinessCityValidation;
use App\Rules\BusinessCountryValidation;
use App\Rules\BusinessDeliveryOptionValidation;
use App\Rules\BusinessLatitudeValidation;
use App\Rules\BusinessLogitudeValidation;
use App\Rules\BusinessNameValidation;
use App\Rules\CategoryValidation;
use App\Rules\CustomPasswordValidation;
use App\Rules\EmailValidation;
use App\Rules\FullNameValidation;
use App\Rules\GenderValidation;
use App\Rules\PasswordValidation;
use App\Rules\ProductsValidation;
use App\Rules\RoleValidation;
use App\Rules\UserValidation;
use App\Rules\ValidPhone;
use App\Rules\VehicleValidation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Validator;

class UserController extends Controller
{
    /**
     * @SWG\Swagger(
     *     basePath="/api/v1",
     *     schemes={"http", "https"},
     *     host=L5_SWAGGER_CONST_HOST,
     * @SWG\Info(
     *         version="1.0.0",
     *         title="Wasel Login API",
     *         description="Wasel Login API",
     * @SWG\Contact(
     *             email="manish@devopsdrop.online"
     *         ),
     *     )
     * )
     */
    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'email' => [new EmailValidation()],
            'password' => [new PasswordValidation()],
            ]
        );

        if ($validator->fails()) {
            $return_message = $this->customValidation($validator->errors());

            return response()->json(
                ['error' => $return_message,
                'success' => false, 'code' => Response::HTTP_BAD_REQUEST, ],
                Response::HTTP_BAD_REQUEST
            );
        }

        $input_elements = $request->all();
        $common = new CommonService();

        try {
            $result = $common->loginService($input_elements);
        } catch (Exception $e) {
            throw new ModelNotFoundException('User not found by ID '.$input_elements['email']);
        }

        if ($result['success'] == true) {
            return response()->json(
                ['data' => $result, 'success' => true,
                'message' => 'User loggedIn successfully.', 'code' => Response::HTTP_OK, ],
                Response::HTTP_OK
            );
        } else {
            return response()->json(
                ['data' => [],
                'error' => ['message' => 'Unauthorised access for email "'.$input_elements['email'].'"'],
                'success' => false, 'code' => Response::HTTP_UNAUTHORIZED, ],
                Response::HTTP_UNAUTHORIZED
            );
        }
    }

    /**
     * Register api.
     *
     * @param Request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        Log::info(json_encode($request->all()));

        $validator_condition = $this->validateUser($request);

        if ($validator_condition['validation'] != false) {
            return response()->json(
                ['error' => $validator_condition['message'], 'success' => false,
                'code' => Response::HTTP_BAD_REQUEST, ],
                Response::HTTP_BAD_REQUEST
            );
        }

        $data = $request->all();

        if (count($data) < 1) {
            $message['message'] = 'Please submit valid request again';

            return response()->json(
                ['error' => $message, 'success' => false,
                'code' => Response::HTTP_BAD_REQUEST, ],
                Response::HTTP_BAD_REQUEST
            );
        }

        $result = [];
        try {
            switch ($data['role_id']) {
                case 1:
                    $driver_obj = new DriverService();
                    $result = $driver_obj->registerDriver($data);
                    break;
                case 2:
                    $business_obj = new BusinessService();
                    $result = $business_obj->registerBusiness($data);
                    break;
                case 3:
                    $business_obj = new BusinessService();
                    $result = $business_obj->registerBusiness($data);
                    //$result = $this->registerProvider($data);
                    break;
                case 4:
                    //this function isn't avaliable for now
                    $result = $this->registerAdmin($data);
                    break;
                case 5:
                    $common_obj_user = new CommonService();
                    $result = $common_obj_user->registerUser($data);
                    break;
                default:
                    $common_obj_user = new CommonService();
                    $result = $common_obj_user->registerUser($data);
                    break;
            }
        } catch (Exception $e) {
            $return_message['message'] = 'Bad connection request.';

            return response()->json(
                ['error' => $return_message,
                'success' => false, 'code' => Response::HTTP_BAD_REQUEST, ],
                Response::HTTP_BAD_REQUEST
            );
        }

        if ($result['success'] == true) {
            $user['message'] = 'User Registered Successfully.';

            return response()->json(
                ['data' => $result, 'success' => true,
                'code' => Response::HTTP_CREATED, 'message' => $user['message'], ],
                Response::HTTP_CREATED
            );
        } else {
            $return_message = $result['message'];

            return response()->json(
                ['error' => array('message' => $return_message),
                'success' => false, 'code' => Response::HTTP_UNAUTHORIZED, ],
                Response::HTTP_UNAUTHORIZED
            );
        }
    }

    /**
     * @SWG\Get(
     *      path="/profile",
     *      operationId="getProfile",
     *      tags={"Profile"},
     *      summary="Get profile of loggedIn User",
     *      description="Returns user profile",
     * @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     * @SWG\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns user profile
     */

    /**
     * @SWG\SecurityScheme(
     *   securityDefinition="passport",
     *   type="oauth2",
     *   tokenUrl="/oauth/token",
     *   flow="password",
     *   scopes={}
     * )
     */
    public function profile()
    {
        $user = Auth::user();
        if (!$user) {
            $return_message['message'] = 'This user is not found';

            return response()->json(
                ['error' => $return_message,
                'success' => false, 'code' => Response::HTTP_BAD_REQUEST, ],
                Response::HTTP_BAD_REQUEST
            );
        }
        // finding user id along with access token
        $users = User::find($user->id);
        $result['success'] = true;

        //$user_role = $users->roles()->where('roles.id',)->get();
        if ($result['success'] != true) {
            $return_message['message'] = 'Unauthorised access';

            return response()->json(
                ['error' => $return_message,
                'success' => false, 'code' => Response::HTTP_UNAUTHORIZED, ],
                Response::HTTP_UNAUTHORIZED
            );
        }

        return response()->json(
            ['data' => $users, 'success' => true,
            'code' => Response::HTTP_OK, 'message' => 'Profile fetched successfully.', ],
            Response::HTTP_OK
        );
    }

    /**
     * @SWG\Post(
     *      path="/forgot",
     *      operationId="getEmailForProfile",
     *      tags={"forgoPassword"},
     *      summary="get email for user",
     *      description="Returns email template",
     * @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     * @SWG\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of projects
     */
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'email' => [new EmailValidation()],
            ]
        );

        if ($validator->fails()) {
            $return_message = $this->customValidation($validator->errors());

            return response()->json(
                ['error' => $return_message,
                'success' => false, 'code' => Response::HTTP_BAD_REQUEST, ],
                Response::HTTP_BAD_REQUEST
            );
        }
        $input = $request->all();

        $common = new CommonService();
        $result = $common->forgotService($input);

        if ($result['success'] == true) {
            return response()->json(
                ['data' => $result, 'message' => 'Request processed successfully.',
                'success' => true, 'code' => Response::HTTP_OK, ],
                Response::HTTP_OK
            );
        } else {
            $return_message['message'] = 'Email not found with us';

            return response()->json(
                ['error' => $return_message,
                'success' => false, 'code' => Response::HTTP_NOT_FOUND, ],
                Response::HTTP_NOT_FOUND
            );
        }
    }

    /**
     * @return validation message
     *
     * @param validation error function
     */
    public function customValidation($validation)
    {
        $errors = $validation;

        $return_message = [];
        $messages = $errors->all();
        $size = sizeof($messages);
        for ($i = 0; $i < $size; ++$i) {
            $return_message = json_decode($messages[0]);
        }

        return $return_message;
    }

    protected function validateUser($request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'email' => [new UserValidation()],
            'password' => [new PasswordValidation(), new CustomPasswordValidation()],
            'full_name' => [new FullNameValidation()],
            'gender' => [new GenderValidation()],
            'role_id' => [new RoleValidation()],
            'mobile_number' => [new ValidPhone()],
            'vehicle_type' => [new VehicleValidation()],
            // validation sequence check
            'business_name' => [new BusinessNameValidation()],
            'business_country' => [new BusinessCountryValidation()],
            'business_address' => [new BusinessAddressValidation()],
            'business_city' => [new BusinessCityValidation()],
            'business_latitude' => [new BusinessLatitudeValidation()],
            'business_longitude' => [new BusinessLogitudeValidation()],

            // products and category validation
            'business_categories' => [new CategoryValidation()],
            'business_products' => [new ProductsValidation()],
            // business details validation
            'business_delivery_option' => [new BusinessDeliveryOptionValidation()],
            ]
        );

        if ($validator->fails()) {
            $return_message = $this->customValidation($validator->errors());

            $success['validation'] = true;
            $success['message'] = $return_message;

            return $success;
        }

        $success['validation'] = false;
        $success['message'] = '';

        return $success;
    }

    /**
     * @param Email
     *
     * @return bool
     */
    public function checkUserEmail(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'email' => [new EmailValidation()],
            ]
        );
        if ($validator->fails()) {
            $return_message = $this->customValidation($validator->errors());

            return response()->json(
                ['error' => $return_message,
                'success' => false, 'code' => Response::HTTP_BAD_REQUEST, ],
                Response::HTTP_BAD_REQUEST
            );
        }
        $input = $request->all();
        $common = new CommonService();
        $exist['message'] = 'This Email Does not Exist!';
        $success['exist'] = false;

        $alreadyUser = $common->checkAlreadyUser($input['email']);
        if ($alreadyUser['count'] > 0) {
            $success['exist'] = true;
            $exist['message'] = $alreadyUser['message'];
        }

        return response()->json(
            ['data' => $success, 'message' => $exist['message'],
            'success' => true, 'code' => Response::HTTP_OK, ],
            Response::HTTP_OK
        );
    }
}
