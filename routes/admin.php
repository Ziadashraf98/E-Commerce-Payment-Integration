<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Product\ProductController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){ 
        
        
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware(['checkAdmin','auth:admin,web']);
        
    Route::group(['prefix'=>'dashboard' , 'middleware'=>'auth:admin'],function(){

        Route::resources([
            'categories'=>CategoryController::class,
            'products'=>ProductController::class,
            'orders'=>OrderController::class,
        ]);

        Route::get('/orders/print_pdf/{id}' , [OrderController::class , 'print_PDF'])->name('print_PDF');
    });
});
