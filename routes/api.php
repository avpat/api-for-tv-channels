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

Route::prefix('v1')->group(function () {
    /**
     * task 1: create an get api for the channels
     */
    Route::get('/channels', function(){
        return new ChannelResource(Channel::all());
    })->name('channels.list');

    /**
     * Task 2: GET Programme timetable for a selected channel, for a selected date and timezone.
     */

    Route::get('/channels/{channel_uuid}/{date}/{timezone_continent}/{timezone_region}/{timezone_city?}', 'Api\v1\ChannelController@getTimetable')
        ->where('date','((?:19|20)\d\d)-(0?[1-9]|1[012])-([12][0-9]|3[01]|0?[1-9])')->name('Programme.timetable');

    /**
     * Task 3: GET Programme information for a selected programme.
     */

    Route::get('/channels/{channel_uuid}/programmes/{programme_uuid}', 'Api\v1\ChannelController@getInformation')->name('Programme.information');

});

