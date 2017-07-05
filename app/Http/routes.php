<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Task;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::get('/task/{task}', 'TaskController@show');
    Route::delete('/task/{id}', 'TaskController@destroy');


    Route::post('/notes/{task}', 'TaskController@noteStore');

});

Route::group(['middleware' => 'web'], function () {

    Route::auth();
    Route::get('/home', 'HomeController@index');

});
