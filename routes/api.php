<?php

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

// TODO : Terrible choice of naming; should change the name to artists
Route::get('artists', 'Bands\BandsController@getBands');
Route::get('artists/{mbid}/top-tracks', 'Bands\BandsController@getTopTracks');