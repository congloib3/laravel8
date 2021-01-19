<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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

Route::group(['prefix' => 'auth'], function ($router) {
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('/user-profile', [AuthController::class, 'userProfile']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/refresh', [AuthController::class, 'refresh']);

});


Route::get('/users/{name?}', function($name = null){
    return sprintf('this is name:%s', $name);
});
Route::get('/products/{id?}', function($id = null){
    return sprintf('this is id:%d', $id);
});
Route::match(['get', 'post'], '/students',  function(Request $request){
    return sprintf('Request method is %s', $request->method());
});




