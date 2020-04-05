<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Http\Resources\ActionResource;
use App\Http\Resources\CharacterAbilityResource;
use App\Http\Resources\CharacterResource;
use App\Http\Resources\CharacterSkillResource;
use App\Models\Characters\Character;
use App\Models\Core\Ability;
use App\Models\Core\Alignment;
use App\Models\Core\CharacterAbility;
use App\Models\Core\Dice;
use App\Models\Core\Race;
use App\Models\Core\Size;
use App\Models\Items\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CharacterController extends ApiController
{
    public $model_class    = Character::class;
    public $resource_class = CharacterResource::class;

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

//        $character->languages()->associate(
//            Alignment::findByCode(Arr::get($data, 'alignment'))
//        );

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

    public function actions(Character $character)
    {
        return response(
            ActionResource::collection(
                $character
                    ->actions
                    ->concat(
                        $character
                            ->items
                            ->pluck('actions')
                            ->collapse()
                    )
            )
        );
    }

    // /give/{character}/{item}/{:quantity}/to/{target}/
    public function give(
        Character $character,
        Item $item,
        int $quantity = 1
    ) {
        $character->give(
            $item,
            $quantity
        );

        return response('Give Item');
    }

    public function giveTo(
        Character $character,
        Character $target,
        Item $item,
        int $quantity = 1
    ) {
        $character->giveTo(
            $item,
            $target,
            $quantity
        );

        return response('Gave Item');
    }
}
