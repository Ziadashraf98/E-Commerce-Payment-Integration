<?php

use App\Http\Controllers\Frontend\Cart\CartController;
use App\Http\Controllers\Frontend\Google\GoogleController;
use App\Http\Controllers\Frontend\HomePage\HomePageController;
use App\Http\Controllers\Frontend\Order\OrderController;
use App\Http\Controllers\Frontend\PayPal\PaypalController;
use App\Http\Controllers\Frontend\Product\ProductController;
use App\Http\Controllers\Frontend\Stripe\StripeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Order;

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

Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){ 
        
    Route::controller(HomePageController::class)->group(function() {
    
        Route::get('/' , 'index')->name('/')->middleware('guest');
        Route::get('/redirect' , 'redirect')->name('redirect');
    });
    
    Route::controller(ProductController::class)->group(function() {
    
        Route::get('/product_details/{title}' , 'product_details')->name('product_details');
    });
    
    Route::group(['middleware'=>'auth'] , function(){
        Route::controller(CartController::class)->group(function() {
    
        Route::post('/add_cart/{product_id}' , 'add_cart')->name('add_cart');
        Route::get('/show_cart' , 'show_cart')->name('show_cart');
        Route::get('/delete_cart/{product_id}' , 'delete_cart')->name('delete_cart');
    });
    });
    
    Route::group(['middleware'=>'auth'] , function(){
        Route::controller(OrderController::class)->group(function() {
    
        Route::get('/cash_order' , 'cash_order')->name('cash_order');
    });
    });
    
    Route::group(['middleware'=>'auth'] , function(){
        Route::controller(StripeController::class)->group(function() {
    
        Route::get('/stripe/{totalPrice}' , 'stripe')->name('stripe');
        Route::post('/stripe/{totalPrice}' , 'stripePost')->name('stripe.post');
    });
    });
    
    Route::group(['prefix'=>'paypal' , 'middleware'=>'auth'] , function(){
        Route::controller(PaypalController::class)->group(function() {
    
        Route::get('/' , 'index')->name('paypal.index');
        Route::get('/success' , 'success')->name('paypal.success');
        Route::get('/cancel' , 'cancel')->name('paypal.cancel');
    });
    });

    Route::controller(GoogleController::class)->group(function() {
    
        Route::get('/auth/google' , 'googlePage')->name('googlePage');
        Route::get('/auth/google/callback' , 'googleCallback');
    });
    
});


