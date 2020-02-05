<?php

use Illuminate\Http\Request;

$classes = ['monster'];

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

foreach ($classes as $class)

Route::middleware('auth:api')->get('/user', function (Request $request) {
    Route::get("/$class/retrieve/", 'API/Monster/MonsterAPIController');
});
