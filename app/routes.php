<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Routes which require a login will be passed through the 'auth' routing filter
 */
Route::group(array('before' => 'auth'), function() {
    Route::get('questions/add', function() {});
    Route::get('answers/add', function() {});
    Route::get('questions/vote/{id}/{type}', function($id, $type) {})->where('id', '[0-9]+')->where('type', '(down|up)');
    Route::get('answers/vote/{id}/{type}', function($id, $type) {})->where('id', '[0-9]+')->where('type', '(down|up)');
});

/**
 * Other controllers are routed using REST, to the correct method pre-fixed with
 * the matching HTTP verb
 */
Route::controller('questions', 'QuestionsController');
Route::controller('answers', 'AnswersController');
Route::controller('users', 'UsersController');

/**
 * Homepage
 */
Route::get('/', 'QuestionsController@getIndex');