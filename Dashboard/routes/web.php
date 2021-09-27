<?php


use Illuminate\Support\Facades\Auth;
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

Route::get('/', [DashboardController::class,'index']);

Route::group(['prefix'=>'dashboard','as'=>'dashboard','middleware'=>'verified'],function() {
    Route::get('/',[DashboardController::class,'dashboard']);
    Route::group(['as'=>'.products.'],function(){
        Route::get('all-products',[ProductController::class,'index'])->name('index');
        Route::get('create-product',[ProductController::class,'create'])->name('create')->middleware('password.confirm');
        Route::get('edit-product/{id}',[ProductController::class,'edit'])->name('edit');
        Route::post('store-product',[ProductController::class,'store'])->name('store');
        Route::put('update-product',[ProductController::class,'update'])->name('update');
        Route::delete('delete-product/{product_id}',[ProductController::class,'destroy'])->name('destroy');
    });
});


Auth::routes(['verify'=>true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
