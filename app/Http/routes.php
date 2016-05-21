<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::get('/test', function(){ return 'jwt auth works'; });

    Route::get('/api/v1/companies/{id?}', 'Companies@index');
    Route::post('/api/v1/companies', 'Companies@store');
    Route::post('/api/v1/companies/{id}', 'Companies@update');
    Route::delete('/api/v1/companies/{id}', 'Companies@destroy');

    Route::get('/api/v1/employees/{id?}', 'Employees@index');
    Route::post('/api/v1/employees', 'Employees@store');
    Route::post('/api/v1/employees/{id}', 'Employees@update');
    Route::delete('/api/v1/employees/{id}', 'Employees@destroy');
});

    Route::get('/api/v2/companies/{id?}', 'Companies@index');
    Route::post('/api/v2/companies', 'Companies@store');
    Route::post('/api/v2/companies/{id}', 'Companies@update');
    Route::delete('/api/v2/companies/{id}', 'Companies@destroy');



Route::group(array('prefix' => '/api/v1'), function()
{
    Route::post('/authenticate', 'Auth\AuthController@authenticate');


});

