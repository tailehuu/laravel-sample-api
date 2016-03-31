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

Route::get('/', ['uses' => 'WelcomeController@index']);

Route::group(['prefix' => 'post/{post}'], function () {
    Route::post('addTagsToPost', 'PostController@addTagsToPost');
});
Route::post('post/getPostsByTags', 'PostController@getPostsByTags');
Route::post('post/countPostsByTags', 'PostController@countPostsByTags');
Route::resource('post', 'PostController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

Route::resource('tag', 'TagController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);