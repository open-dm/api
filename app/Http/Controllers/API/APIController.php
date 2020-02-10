<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiListRequest;
use App\Models\Characters\Character;
use App\Models\Characters\Monster;
use App\Models\Characters\Player;
use App\Models\Core\Alignment;
use App\Models\Core\Dice;
use App\Models\Core\Size;
use Illuminate\Support\Arr;

class APIController extends Controller
{
    public function list(ApiListRequest $request)
    {
        $validated = $request->validated();

        $limit = Arr::get($validated, 'limit', 100);
        $offset = Arr::get($validated, 'offset', 0);

        return response()->json(
            $this->list_resource_class::collection(
                $this->model_class
                    ::skip($offset)
                    ->take($limit)
                    ->get()
            )
        );
    }

    public function retrieve(int $id)
    {
        dd(
            Character::all(),
            Monster::all(),
            Player::all()
        );

        dd('done');

        $character = new Character([
            'name' => 'FuckNuckle',
            'type' => 'player',
            'base_hp' => 15,
            'speed' => 30,
            'strength' => 14,
            'dexterity' => 14,
            'constitution' => 14,
            'intelligence' => 14,
            'wisdom' => 14,
            'charisma' => 14,
            'hp_dice_count' => 2,
            'is_template' => true,
        ]);

        $character->size()->associate(Size::findByCode('huge'));
        $character->alignment()->associate(Alignment::findByCode('chaotic_evil'));
        $character->hp_dice()->associate(Dice::find(4));

        $character->save();

        dd($character);

        dd('done');
        return response()
            ->json(
                new $this->resource_class(
                    $this->model_class::find($id)
                )
            );
    }
}
