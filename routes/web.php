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

//edit
Route::get('/logged/post/edit/{id}', 'HomeController@edit') -> name('edit');
Route::post('/logged/post/update/{id}', 'HomeController@update') -> name('update');

//delete
Route::get('/logged/post/delete/{id}', 'HomeController@delete') -> name('delete');

//VUE PAGE
Route::get('/logged/post/vue', 'MainController@vue_page') -> name('vue_page');
//axios
Route::get('/posts/list', 'MainController@get_post');
Route::get('/posts/category', 'MainController@get_category');
Route::get('/posts/reaction', 'MainController@get_reaction');

//create new element
Route::get('/posts/create', 'HomeController@create') -> name('create');
Route::post('/posts/store', 'HomeController@store') -> name('store');