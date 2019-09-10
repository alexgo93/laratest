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

use Illuminate\Support\Facades\Route;

// Auth routes
Auth::routes(['verify' => true]);

// Маршруты аутентификации...
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Маршруты регистрации...
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/verify', 'Auth\VerificationController@show');

// Post Routes
Route::get('/', 'PostController@index');
Route::post('/post', 'PostController@create');
Route::get('/post/{id}', 'PostController@read')->name('edit.post');
Route::put('/post/{id}', 'PostController@update')->name('update.post');
Route::delete('/post/{id}', 'PostController@delete')->name('destroy.post');

// Home Routes
Route::get('/home', 'HomeController@index')->name('home');
