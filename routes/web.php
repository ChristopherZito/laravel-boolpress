<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'MainController@home') -> name('home');

Route::get('/logged/post', 'MainController@post') -> name('post');

Route::post('/login', 'Auth\LoginController@login') -> name('login');
Route::post('/register', 'Auth\RegisterController@register') -> name('register');
Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');


//axios
Route::get('/posts/list', 'MainController@get_post');

//create new element
Route::get('/posts/create', 'MainController@create') -> name('create');
Route::post('/posts/store', 'MainController@store') -> name('store');