<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'Api\RegisterController@register');
Route::post('/login', 'Api\RegisterController@login');

Route::post('/admin-register', 'Api\AdminRegistrationController@register');
Route::post('/admin-login', 'Api\AdminRegistrationController@login');

Route::middleware('auth:api')->namespace('Api')->group(function () {
    Route::get('/products', 'ProductController@products');
});

// Route::get('/get-user', 'UserController@users');
// Route::post('/create-user', 'UserController@create');



