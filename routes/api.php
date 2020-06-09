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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register','PassportController@register');
Route::post('login','PassportController@login');
Route::post('update/{id}','PassportController@update');
Route::delete('delete/{id}','PassportController@delete');

Route::post('/student','StudentController@create');
Route::get('/show','StudentController@show');
Route::get('/show/{id}','StudentController@showbyId');
Route::post('updateStu/{id}','StudentController@updateStu');
Route::delete('deleteStu/{id}','StudentController@deleteStu');

