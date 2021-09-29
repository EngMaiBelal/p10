<?php

use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\AuthController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware'=>'checkLang'],function(){
    // verified routes
    Route::group(['middleware'=>'verified'],function(){
        Route::group(['prefix'=>'products'],function (){
            Route::get('/all',[ProductController::class,'index']);
            Route::get('/create',[ProductController::class,'create']);
            Route::post('/store',[ProductController::class,'store']);
            Route::get('{id}/edit',[ProductController::class,'edit']);
            Route::put('update',[ProductController::class,'update']);
            Route::delete('destroy/{id}',[ProductController::class,'destroy']);
        });

        Route::group(['prefix'=>'categories'],function (){

        });
        Route::group(['prefix'=>'auth' ],function(){
            // authenticated & verified
            Route::group(['middleware'=>'verified'],function(){
                Route::post('set-new-password',[AuthController::class,'setNewPassword']);
                Route::get('profile',[AuthController::class,'profile']);
            });

        });
    });
    // autheticated routes
    Route::group(['middleware'=>'auth:sanctum'],function(){
        Route::group(['prefix'=>'auth' ],function(){
        // // guest
        // Route::post('register',[AuthController::class,'register'])->withoutMiddleware('auth:sanctum');
        // Route::post('login',[AuthController::class,'login'])->withoutMiddleware('auth:sanctum');
        // Route::post('verify-email',[AuthController::class,'verifyEmail'])->withoutMiddleware('auth:sanctum');

        Route::get('send-code',[AuthController::class,'sendCode']);
        Route::post('verify-code',[AuthController::class,'verifyCode']);
        Route::get('logout',[AuthController::class,'logout']);
        });
    });
    // guest routes
    Route::group(['middleware'=>'guest'],function(){
        Route::group(['prefix'=>'auth' ],function(){
            Route::post('register',[AuthController::class,'register'])->withoutMiddleware('auth:sanctum');
            Route::post('login',[AuthController::class,'login'])->withoutMiddleware('auth:sanctum');
            Route::post('verify-email',[AuthController::class,'verifyEmail'])->withoutMiddleware('auth:sanctum');
        });
    });







});


//
/**
 *
 * API => login => POST => url => 127.0.0.1:8000/user/login , inputs => body { "email":"","password":} , o/p => {"success":true,"user":{}}
 * API => ALL PRODUCTS => GET => url 127.0.0.1:8000/products/all , inputs => {} , o/p => {"products":[]}
 */
