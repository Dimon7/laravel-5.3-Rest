<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});

//cors
Route::group( ['middleware' => ['cors']] , function() {

    //user
    Route::group(['prefix' => 'user'], function () {

        Route::post('', 'UserController@createUser');
        Route::get('', 'UserController@getAllUser');
        Route::get('{id}', 'UserController@getUserById');
        Route::put('{id}', 'UserController@updateUser');
        Route::delete('{id}', 'UserController@deleteUser');
        Route::get('role/{role}', 'UserController@getUserByRole');

        Route::get('{id}/namesoftextpart', 'TextPartController@getListOfNamesOFTextPartsOfUserById');

    });
    //texpart
    Route::group(['prefix' => 'textpart'], function () {

        Route::post('', 'TextPartController@createTextPart');
        Route::get('names', 'TextPartController@getAllNamesOfTextPart');
        Route::get('{id}', 'TextPartController@getTextPartById');
        Route::put('{id}', 'TextPartController@updateTextPart');
        Route::delete('{id}', 'TextPartController@deleteTextPart');


    });
    //language
    Route::group(['prefix' => 'language'], function () {

        Route::post('', 'LanguageController@createLanguage');
        Route::get('', 'LanguageController@getListOfLanguage');
        Route::delete('{id}', 'LanguageController@deleteLanguage');

    });
    //textproject
    Route::group(['prefix' => 'textproject'], function () {

        Route::post('', 'TextProjectController@createTextProject');
        Route::get('', 'TextProjectController@getAllTextProject');
        Route::get('{id}', 'TextProjectController@getTextProjectById');
        Route::put('{id}', 'TextProjectController@updateTextProject');
        Route::delete('{id}', 'TextProjectController@deleteTextProject');

        Route::get('text/{id}', 'TextPartController@getText');
    });

});


