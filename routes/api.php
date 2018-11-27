<?php

use Illuminate\Http\Request;

/*
 * @author Manish Jakhode
 * @return routes url
 * @param defined
 * @method prefix v1 get,post,put,delete
 *
 */

Route::prefix('v1')->group(function () {
 
    Route::get('roles', 'Common\RoleController@index');
    // Login API
    //Route::post('login', 'API\UserController@login');
    Route::post('login', ['as' => 'login', 'uses' => 'API\UserController@login']);

    // Registration API
    Route::post('register', 'API\UserController@register');
   
    //Route::get('users_list', 'API\AdminController@index');

    // Get User details by Token
    Route::group(['middleware' => 'auth:api'], function () {
        // get Profile Detail By Token
        Route::get('profile', 'API\UserController@profile');
       
    });
});
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
