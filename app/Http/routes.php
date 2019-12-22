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



Route::group(['middle' => 'web'], function(){

    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::resource('/admin/questionnaires', 'QuestionnairesController');

    Route::get('/admin/questions/create/{questionnaire}', 'QuestionsController@createQuestion');

    Route::resource('/admin/questions', 'QuestionsController');

    Route::resource('/admin/options', 'OptionsController');

    Route::resource('/admin/scales', 'ScalesController');
});
