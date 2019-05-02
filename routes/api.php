<?php

use Illuminate\Http\Request;

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

Route::get('/', 'EventController@index');
Route::post('/schedule/create', 'ScheduleController@create');
Route::post('/event/create', 'EventController@create');
Route::post('/location/create', 'LocationController@create');
Route::post('/event/ticket/create', 'TicketTypeController@create');
Route::get('/event/get_info/{id}', 'EventController@getInfo');
Route::post('/transaction/purchase', 'TransactionController@purchase');
Route::get('/transaction/get_info/{id}', 'TransactionController@getInfo');
