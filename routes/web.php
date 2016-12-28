<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('channels', 'ChannelsController@index');
Route::post('channels', 'ChannelsController@store');

Route::get('community', 'CommunityLinksController@index');
Route::post('community', 'CommunityLinksController@store');
Route::get('community/{channel}', 'CommunityLinksController@index');

Route::post('votes/{link}', 'VotesController@store');
