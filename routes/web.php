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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified')->name('home');

Route::get('/profile/{user}', 'ProfileController@index');
Route::get('profile/{user}/edit', 'ProfileController@edit');
Route::patch('profile/{profile}', 'ProfileController@update');

Route::get('post/create', 'PostController@index')->name('post.create');
Route::post('/post', 'PostController@create')->name('post.store');
Route::get('/post/{post}', 'PostController@show')->name('post.show');
Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');
Route::patch('post/{post}', 'PostController@update');
Route::delete('post/{post}', 'PostController@delete');

//Route::resource('post', 'PostController');

Route::post('follow/{user}', 'FollowController@store');

