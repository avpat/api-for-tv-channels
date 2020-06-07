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
 * task 2: Get Programm timetable for selected channel, selected date and timezone
 * i.e.
 */


/**
 * Task 2: GET Programme timetable for a selected channel, for a selected date and timezone.

 *
 *
 */

Route::get('/channels/{channel_uuid}/{date}/{timezone_continent}/{timezone_region}/{timezone_city?}', 'ChannelController@getTimetable');

//
//Route::get('api/users/{user}/posts/{post:slug}', function (User $user, Post $post) {
//    return $post;
//});

Route::get('/channels/{channel-uuid}', function($uuid){
    return $uuid;

    // return new ChannelResource(Channel::all());
});

/**
 * Task 3: GET Programme information for a selected programme.
 */

Route::get('/channels/{channel-uuid}/programmes/{programme-uuid}', function(){
    return new ChannelResource(Channel::all());
});

//Route::get('/channels/{channel-uuid}/{date}/{timezone}', function(\App\Channel $song) {
//    return (new SongResource(Song::find(1)))->additional([
//        'meta' => [
//            'anything' => 'Some Value'
//        ]
//    ]);
//})
//
//Route::get('api/users/{user}/posts/{post:slug}', function (User $user, Post $post) {
//    return $post;
//});
