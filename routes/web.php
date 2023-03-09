<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Front\HomeController@index')->name('home');
Route::get('post/{slug}', 'Front\HomeController@show')->name('post.show');
Route::get('category/{slug}', 'Front\CategoryController@show')->name('category.show');
Route::get('tag/{slug}', 'Front\TagController@show')->name('tag.show');
Route::get('/search', 'Front\SearchController@index')->name('search');

Route::get('/contact', 'Front\ContactController@show')->name('show.form');
Route::post('/contact', 'Front\ContactController@show')->name('sent.form');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/posts', 'PostController');
});

Route::group(['middleware' => 'guest'], function(){
    Route::get('register', 'UserController@create')->name('register.create');
    Route::post('register', 'UserController@store')->name('register.store');
    Route::get('login', 'UserController@loginForm')->name('login.form');
    Route::post('login', 'UserController@login')->name('login');
});

Route::get('logout', 'UserController@logout')->name('logout')->middleware('auth');

