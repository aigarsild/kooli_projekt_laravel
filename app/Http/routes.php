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

// CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, X-Auth-Token, Origin, Authorization');

Route::auth();
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['jwt.auth']], function () {

    Route::get('/api/v1/companies/{id?}', 'Companies@index');
    Route::post('/api/v1/companies', 'Companies@store');
    Route::post('/api/v1/companies/edit/{id}', 'Companies@update');
    Route::delete('/api/v1/companies/{id}', 'Companies@destroy');

    Route::get('/api/v1/employees/{id?}', 'Employees@index');
    Route::post('/api/v1/employees', 'Employees@store');
    Route::post('/api/v1/employees/{id}', 'Employees@update');
    Route::delete('/api/v1/employees/{id}', 'Employees@destroy');

    Route::get('/api/v2/employees/{id?}', 'Employees@index');

    Route::get('/api/v2/company/employee/{id?}', 'Employees@findCompanyEmployees');
    Route::get('/api/v2/employee/company/{id?}', 'Employees@findEmployeeCompany');


    Route::get('/api/v2/feedback/{id?}', 'FeedbackController@findEmployeeFeedback');
    Route::get('/api/v2/employees/{id?}', 'FeedbackController@findFeedbackEmployee');
    Route::get('/api/v2/feedbacks', 'FeedbackController@show');


    
});
Route::get('/api/v1/users/all', 'Users@showAll');
Route::get('/api/v1/users/{id?}', 'Users@show');

//test orutes
    Route::get('/api/v2/companies/{id?}', 'Companies@index');
    Route::post('/api/v2/companies', 'Companies@store');
    Route::post('/api/v2/companies/{id}', 'Companies@update');
    Route::delete('/api/v2/companies/{id}', 'Companies@destroy');





Route::post('/api/v2/employees', 'Employees@store');
Route::post('/api/v2/employees/{id}', 'Employees@update');
Route::delete('/api/v2/employees/{id}', 'Employees@destroy');




Route::group(array('prefix' => '/api/v1'), function()
{
    Route::post('/authenticate', 'Auth\AuthController@authenticate');

    Route::get('/logout', [ 'uses' => 'Auth\AuthController@getLogout']);
});

