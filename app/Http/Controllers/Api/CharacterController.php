<?php

namespace App\Http\Controllers\Api;

use Exception;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Core\Dice;
use App\Models\Core\Race;
use App\Models\Core\Size;
use App\Models\Items\Item;
use App\Models\Core\Alignment;
use App\Models\Characters\Character;

use App\Http\Resources\ActionResource;

use App\Http\Resources\CharacterResource;
use App\Http\Requests\CreateCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;

class CharacterController extends ApiController
{
    public static $model_class    = Character::class;
    public static $resource_class = CharacterResource::class;

    /**
     * Create a new Character instance
     *
     * @param CreateCharacterRequest $request
     *
     * @return Response
     */
    public function create(CreateCharacterRequest $request)
    {
        $data = $request->validated();

        $character = new self::$model_class(
            Arr::only(
                $data,
                [
                    'name',
                    'type',
                    'speed',
                ]
            )
        );

        $character->base_hit_points = 10;
        $character->hit_point_dice_count = 10;

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

        $character->hit_point_dice()->associate(
            Dice::findBy('sides', Arr::get($data, 'hit_point_dice'))
        );

        $character->save();

        $character->abilities = Arr::get($data, 'abilities');

        return response(self::$resource_class::make($character));
    }

    /**
     * Update defined attributes on the character object
     *
     * @param UpdateCharacterRequest $request
     * @param Character $character
     *
     * @return Response
     */
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

        if (Arr::has($data, 'hit_point_dice')) {
            $character->hit_point_dice()->associate(
                Dice::findBy('sides', Arr::get($data, 'hit_point_dice'))
            );
        }

        $character->save();

        return response(self::$resource_class::make($character));
    }

    /**
     * @param Character $character
     *
     * @return void
     *
     * @throws Exception
     */
    public function delete(Character $character)
    {
        $character->delete();
    }

    /**
     * List a Characters available actions
     *
     * @param Character $character
     *
     * @return Response
     */
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
