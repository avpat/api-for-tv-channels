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

use \App\Http\Resources\ChannelResource;
use \App\Channel;
use \App\Programme;

/**
 * task 1: create an get api for the channels
 */
Route::get('/channels', function(){
    return new ChannelResource(Channel::all());
});

/**
 * Task 2: GET Programme timetable for a selected channel, for a selected date and timezone.
 */

Route::get('/channels/{channel_uuid}/{date}/{timezone_continent}/{timezone_region}/{timezone_city?}', 'ChannelController@getTimetable');

/**
 * Task 3: GET Programme information for a selected programme.
 */

Route::get('/channels/{channel_uuid}/programmes/{programme_uuid}', 'ChannelController@getInformation');
