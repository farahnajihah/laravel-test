<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

	
});

Route::post('editProfile', 'ProfileController@editProfile');
Route::post('addstory', 'ProfileController@addstoryAPI');
Route::post('updatestory', 'ProfileController@updatestoryAPI');
Route::delete('deletestory/{id}', 'ProfileController@deletestory');