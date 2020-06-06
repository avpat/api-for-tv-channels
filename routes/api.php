<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * task 1: create an get api for the channels
 */
Route::get('/channels', function(){
    return new \App\Http\Resources\ChannelResource(\App\Channel::all());
});

/**
 * task 2: Get Programm timetable for selected channel, selected date and timezone
 * i.e.
 */

Route::get('/channels/', function(){
    return new \App\Http\Resources\ChannelResource(\App\Channel::all());
});
