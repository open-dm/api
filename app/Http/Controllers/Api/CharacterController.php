<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Http\Resources\CharacterResource;
use App\Models\Characters\Character;
use App\Models\Core\Alignment;
use App\Models\Core\Dice;
use App\Models\Core\Race;
use App\Models\Core\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CharacterController extends Controller
{
    public static $character_class    = Character::class;
    public static $character_resource = CharacterResource::class;

    public function create(CreateCharacterRequest $request)
    {
        $data = $request->validated();

        $character = new static::$character_class(
            Arr::only(
                $data,
                [
                    'name',
                    'type',
                    'abilities',
                ]
            )
        );

        $character->base_hp = 10;
        $character->hp_dice_count = 10;

        $character->race()->associate(
            Race::findByCode(Arr::get($data, 'race'))
        );

        $character->size()->associate(
            Size::findByCode(Arr::get($data, 'size'))
        );

        $character->alignment()->associate(
            Alignment::findByCode(Arr::get($data, 'alignment'))
        );

        $character->hp_dice()->associate(
            Dice::findBy('sides', Arr::get($data, 'hp_dice'))
        );

        $character->save();

        return response(static::$character_resource::make($character));
    }

    public function update(UpdateCharacterRequest $request, Character $character)
    {
        $data = $request->validated();

        $character->fill(
            Arr::only(
                $data,
                [
                    'name',
                    'type',
                    'abilities',
                ]
            )
        );

//        $character->base_hp = 10;
//        $character->hp_dice_count = 10;

        if (Arr::has($data, 'race')) {
            $character->race()->associate(
                Race::findByCode(Arr::get($data, 'race'))
            );
        }

        if (Arr::has($data, 'size')) {
            $character->size()->associate(
                Size::findByCode(Arr::get($data, 'size'))
            );
        }

        if (Arr::has($data, 'alignment')) {
            $character->alignment()->associate(
                Alignment::findByCode(Arr::get($data, 'alignment'))
            );
        }

        if (Arr::has($data, 'hp_dice')) {
            $character->hp_dice()->associate(
                Dice::findBy('sides', Arr::get($data, 'hp_dice'))
            );
        }

        $character->save();

        return response(static::$character_resource::make($character));
    }

    public function delete(Character $character)
    {
        $character->delete();
    }

    public function get(Character $character)
    {
        /**
         * TODO - Check if owned by user.
         */
        return response(static::$character_resource::make($character));
    }

    public function list(Request $request)
    {
        /**
         * TODO - Only get characters owned by user.
         */
        return response(
            static::$character_resource::collection(
                static::$character_class::all()
            )
        );
    }
}
