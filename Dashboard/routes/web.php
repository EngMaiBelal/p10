<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'dashboard','as'=>'dashboard'],function() {
    Route::get('/',[DashboardController::class,'index']);
    Route::group(['as'=>'.products.'],function(){
        Route::get('all-products',[ProductController::class,'index'])->name('index');
        Route::get('create-products',[ProductController::class,'create'])->name('create');
        Route::get('edit-products',[ProductController::class,'edit'])->name('edit');
        Route::post('store-products',[ProductController::class,'store'])->name('store');
    });

});