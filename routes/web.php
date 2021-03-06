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
    return view('index');
});

Route::resource('videos', 'VideoController');

Route::resource('audio-clips', 'AudioClipController');

/**
 * Get Video Payload for FB Messenger
 */
Route::get(
    '/api/{media_type}/{id}',
    ['uses' => 'PayloadController@mediaAttachment',
    'as' => 'payload.media_attachment']
);
