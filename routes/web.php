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

Route::get('/home', 'UserHomeController@index')->name('user.home');

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('login');
        Route::post('/login', 'Auth\Admin\LoginController@login');
        Route::post('/logout', 'Auth\Admin\LoginController@logout')->name('logout');
        Route::post('/password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('password-email');
        Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset');
        Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('password-request');
        Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('password-reset');
        Route::get('/register', 'Auth\Admin\RegisterController@showRegistrationForm')->name('register');
        Route::post('/register', 'Auth\Admin\RegisterController@register');
        Route::get('/home', 'AdminController@index')->name('home');
    });
});

Route::get('/', function () {
    return view('welcome');
})->middleware(['guest:web', 'guest:admin']);
