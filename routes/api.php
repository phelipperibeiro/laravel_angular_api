<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get('client', 'ClientController@index');
Route::get('client/{id}', 'ClientController@show');
Route::post('client', 'ClientController@create');
Route::put('client', 'ClientController@create');
Route::delete('client/{id}', 'ClientController@destroy');

Route::get('project', 'ProjectController@index');
Route::get('project/{id}', 'ProjectController@show');
Route::post('project', 'ProjectController@create');
Route::put('project', 'ProjectController@create');
Route::delete('project/{id}', 'ProjectController@destroy');