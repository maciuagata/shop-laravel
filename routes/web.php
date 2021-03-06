<?php

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

Route::view('/file-upload', 'upload');
Route::post('/file-upload', 'GeneralController@store');
Route::get('/view-uploads', 'GeneralController@viewUploads');

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::post('/checkout', [
    'uses' => 'ProductController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::get('/reduce/{id}', [
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);

Route::get('/remove/{id}', [
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.remove'
]);

Route::get('/increase/{id}', [
    'uses' => 'ProductController@getIncreaseByOne',
    'as' => 'product.increase'
]);

Route::group(['prefix' => 'users'], function() {
    
    Route::group(['middleware' => 'guest'], function() {

        Route::get('/signup', [
            'uses' => 'UsersController@getSignup',
            'as' => 'users.signup'
        ]);
    
        Route::post('/signup', [
            'uses' => 'UsersController@postSignup',
            'as' => 'users.signup'
        ]);
        
        Route::get('/signin', [
            'uses' => 'UsersController@getSignin',
            'as' => 'users.signin'
        ]);
        
        Route::post('/signin', [
            'uses' => 'UsersController@postSignin',
            'as' => 'users.signin'
        ]);
    });
    
    Route::group(['middleware' => 'auth'], function() {

        Route::get('/profile', [
            'uses' => 'UsersController@getProfile',
            'as' => 'users.profile'
        ]);
        
        Route::get('/logout', [
            'uses' => 'UsersController@getLogout',
            'as' => 'users.logout'
        ]);

    });
});

