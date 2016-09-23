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

Route::get('/',['as' => 'post', 'uses' => 'SocialPostingController@index']);
Route::get('quote', ['as' => 'post.show']);
Route::get('facebook/callback', ['uses' => 'SocialPostingController@facebookCallback']);
Route::get('create-post', ['as'=>'createpost','uses'=>'SocialPostingController@createPost']);
Route::post('create-post', ['uses'=>'SocialPostingController@createPost']);






