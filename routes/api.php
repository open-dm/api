<?php

use App\Models\Characters\Character;
use App\Models\Characters\Monster;
use App\Models\Characters\Player;
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

Route
    ::middleware('api')
    ->group(function () {
        Route::model('character', Character::class);

        Route::post('/character/create/', 'Api\CharacterController@create');
        Route::post('/character/update/{character}/', 'Api\CharacterController@update');
        Route::delete('/character/delete/{character}/', 'Api\CharacterController@delete');

        Route::get('/character/retrieve/{character}/', 'Api\CharacterController@retrieve');
        Route::get('/character/list/', 'Api\CharacterController@list');
    });

Route
    ::middleware('api')
    ->group(function () {
        Route::model('player', Player::class);

        Route::post('/player/create/', 'Api\PlayerController@create');
        Route::post('/player/update/{player}/', 'Api\PlayerController@update');
        Route::delete('/player/delete/{player}/', 'Api\PlayerController@delete');

        Route::get('/player/retrieve/{player}/', 'Api\PlayerController@retrieve');
        Route::get('/player/list/', 'Api\PlayerController@list');
    });

Route
    ::middleware('api')
    ->group(function () {
        Route::model('monster', Monster::class);

        Route::post('/monster/create/', 'Api\MonsterController@create');
        Route::post('/monster/update/{monster}/', 'Api\MonsterController@update');
        Route::delete('/monster/delete/{monster}/', 'Api\MonsterController@delete');

        Route::get('/monster/retrieve/{monster}/', 'Api\MonsterController@retrieve');
        Route::get('/monster/list/', 'Api\MonsterController@list');
    });


Route
    ::middleware('api')
    ->group(function () {
        Route::get('/alignment/list/', 'Api\AlignmentController@list');
    });

Route
    ::middleware('api')
    ->group(function () {
        Route::get('/size/list/', 'Api\SizeController@list');
    });
