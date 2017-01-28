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




    Route::get('/', ['as'=>'home','uses' => 'ShopController@index']);
    Route::get('about', ['as'=>'about','uses' => 'ShopController@about']);

    Route::group(['prefix'=>'categories'],function(){
            Route::get('man',['as'=>'man','uses'=>'CategoryController@man']);
            Route::get('woman',['as'=>'woman','uses'=>'CategoryController@woman']);
            Route::get('accessories',['as'=>'accessories','uses'=>'CategoryController@accessories']);

    });

Route::group(['prefix'=>'panel','middleware'=>'SentAuth'],function(){
    Route::get('/',['as'=>'user_cab','uses'=>'Cabinet\CabinetController@index']);
    Route::get('/profile',['as'=>'profile','uses'=>'Cabinet\ProfileController@index']);
    Route::get('/myorders',['as'=>'myorders','uses'=>'Cabinet\OrderController@index']);

    Route::group(['middleware'=>'Admin'],function() {
        Route::post('product/ajax', ['as'=>'product.ajax','uses'=>'Admin\ProductController@ajax']); //
        Route::resource('product','Admin\ProductController');
        Route::resource('category','Admin\CategoryController');
        Route::resource('orders','Admin\OrderController');
        Route::resource('users','Admin\UserController');
        Route::get('settings',['as'=>'settings','uses'=>'Admin\SettingsController@index']);

    });

});


Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegisterForm']);
Route::post('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@createUser']);

Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@loginUser']);

Route::get('password/reset', ['as' => 'password/reset', 'uses' => 'Auth\ForgotPasswordController@index']);
Route::post('password/email', ['as' => 'password/email', 'uses' => 'Auth\ForgotPasswordController@sendPasswordEmail']);


