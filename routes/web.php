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

Route::get('/zodiac', 'ZodiacController@index')->name('zodiac');
Route::get('/zodiacNew', 'ZodiacController@zodiacForm')->name('newZodiac');
Route::post('/zodiacNew', 'ZodiacController@store');
Route::get('/zodiacEdit/{id}', 'ZodiacController@zodiacEdit');
Route::post('zodiacEdit/{id}', 'ZodiacController@update');
Route::get('/zodiacDelete/{id}', 'ZodiacController@delete');
Route::post('/selectedDate', 'ZodiacController@dateForm');
Route::get('/date', 'ZodiacController@date');
Route::post('/dateNew', 'ZodiacController@storeByDate');

/* User routes */
Route::get('/', 'UserController@index')->name('home');


Route::get('/login', 'UserController@loginForm')->name('login');
Route::get('/register', 'UserController@register')->name('register');

Route::post('/login', 'UserController@signin')->name('signin');
Route::post('register', 'UserController@store')->name('signup');

Route::get('logout', 'UserController@logout')->name('logout');
