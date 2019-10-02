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

Auth::routes();


// the order of the routs matters. You have to define more specific route (/post/create) first, before defining route that accepts params (/post/{post})

Route::get('/post/create', 'PostsController@create');

Route::post('/post', 'PostsController@store');

Route::get('/post/{post}', 'PostsController@show'); // route with variable should be at the end



Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show'); // if get request to home, call index method of HomeController

Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');

Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');
