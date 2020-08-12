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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile', 'HomeController@index')->name('profile.show');
Route::get('/editProfile/{user}', 'ProfileController@index')->name('editProfile.show');
Route::get('/addstory/{user}', 'ProfileController@addstory')->name('addstory.show');
Route::get('/updatestory/{storyid}', 'ProfileController@updatestory')->name('updatestory.show');

Auth::routes();
