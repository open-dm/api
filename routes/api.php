<?php

use App\Models\Characters\Character;
use App\Models\Characters\Monster;
use App\Models\Characters\Player;
use App\Models\Items\Action;
use App\Models\Items\Item;
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

Route::middleware('api')
    ->get('/test', 'TestController@test');

Route
    ::middleware('api')
    ->prefix('character')
    ->group(function () {
        Route::model('character', Character::class);
        Route::model('target', Character::class);
        Route::model('action', Action::class);
        Route::model('item', Item::class);

        Route::get('/list/', 'Api\CharacterController@list');
        Route::get('/actions/{character}/', 'Api\CharacterController@actions');

        Route::post('/create/', 'Api\CharacterController@create');
        Route::post('/update/{character}/', 'Api\CharacterController@update');
        Route::delete('/delete/{character}/', 'Api\CharacterController@delete');
        Route::get('/retrieve/{character}/', 'Api\CharacterController@retrieve');

        Route::post('/give/{character}/{item}/{quantity?}/', 'Api\CharacterController@give');
        Route::post('/take/{character}/{item}/{quantity?}/', 'Api\CharacterController@take');
        Route::post('/give/{character}/{item}/{quantity?}/to/{target}/', 'Api\CharacterController@giveTo');
        Route::post('/take/{character}/{item}/{quantity?}/from/{target}/', 'Api\CharacterController@take');
        Route::post('/action/{character}/{action}/{target}/', 'Api\CharacterController@action');
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
        Route::get('/player/actions/{player}/', 'Api\PlayerController@actions');
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
        Route::get('/monster/actions/{monster}/', 'Api\MonsterController@actions');
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
