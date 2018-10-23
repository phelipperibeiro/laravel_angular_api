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

// Collection Link
// https://www.getpostman.com/collections/0c843890bbc4248487c6

Route::middleware('auth:api')->group(function(){
    
    Route::get('client', 'ClientController@index');
    Route::get('client/{id}', 'ClientController@show');
    Route::put('client', 'ClientController@update');
    Route::post('client', 'ClientController@create');
    Route::delete('client/{id}', 'ClientController@destroy');

    Route::get('project/{id}/note', 'ProjectNoteController@index');
    Route::get('project/{id}/note/{nodeId}', 'ProjectNoteController@show');
    Route::put('project/{id}/note/{nodeId}', 'ProjectNoteController@update');
    Route::post('project/{id}/note', 'ProjectNoteController@create');
    Route::delete('project/{id}/note/{nodeId}', 'ProjectNoteController@destroy');

    Route::get('project', 'ProjectController@index');
    Route::get('project/{id}', 'ProjectController@show');
    Route::put('project', 'ProjectController@update');
    Route::post('project', 'ProjectController@create');
    Route::delete('project/{id}', 'ProjectController@destroy');
    
    Route::post('project/{id}/file', 'ProjectFileController@store');
        
    Route::get('user/me', function(Request $request){
       return $request->user(); 
    });
    
});