<?php

namespace App\Http\Controllers;

use App\Http\Resources\CharacterResource;
use App\Http\Resources\ItemResource;
use App\Models\Characters\Character;
use App\Models\Items\Item;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $item_to_give = Item::findByCode('light_hammer');
        $item_to_take = Item::findByCode('great_axe');

        $character = Character::fromTemplate(
            Character::find(1),
            [
                'name' => 'Test Character',
            ]
        );

        $character->hit_points = $character->rollHitPoints();
        $character->save();

        $character->give($item_to_give);


        $item_to_give->giveTo($character, 1);
        $item_to_give->giveTo($character, 20);
        $item_to_take->takeFrom($character, 1);


        return response(ItemResource::collection($character->items));
    }
}
