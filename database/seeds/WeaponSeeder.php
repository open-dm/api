<?php

use App\Models\Core\Dice;
use App\Models\Items\Action;
use Illuminate\Database\Seeder;

use App\Models\Items\Item;
use App\Models\Items\ItemSubtype;
use App\Models\Items\ItemType;

class WeaponSeeder extends Seeder
{
    public function run()
    {
        $dice = Dice::all();

        /**
         *
         * Insert Weapon Type
         *
         */

        $weapon_item_type = ItemType
            ::where('code', 'weapon')
            ->firstOrCreate([
                'name' => 'Weapon',
                'code' => 'weapon',
            ]);


        /**
         *
         * Insert Weapon SubTypes
         *
         */

        $simple_melee_item_subtype = ItemSubtype
            ::where('code', 'simple_melee')
            ->firstOrCreate([
                'name' => 'Simple Melee',
                'code' => 'simple_melee',
            ]);

        $simple_ranged_item_subtype = ItemSubtype
            ::where('code', 'simple_ranged')
            ->firstOrCreate([
                'name' => 'Simple Ranged',
                'code' => 'simple_ranged',
            ]);

        $martial_melee_item_subtype = ItemSubtype
            ::where('code', 'martial_melee')
            ->firstOrCreate([
                'name' => 'Martial Melee',
                'code' => 'martial_melee',
            ]);

        $martial_ranged_item_subtype = ItemSubtype
            ::where('code', 'martial_ranged')
            ->firstOrCreate([
                'name' => 'Martial Ranged',
                'code' => 'martial_ranged',
            ]);


        /**
         *
         * Insert Simple Melee Weapons
         *
         */

        Item::create([
            'name'       => 'Club',
            'code'       => 'club',
            'cost'       => 1,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Dagger',
            'code'       => 'dagger',
            'cost'       => 2,
            'weight'     => 1,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Greatclub',
            'code'       => 'greatclub',
            'cost'       => 2,
            'weight'     => 10,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Handaxe',
            'code'       => 'Handaxe',
            'cost'       => 5,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Javelin',
            'code'       => 'javelin',
            'cost'       => 5,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Light Hammer',
            'code'       => 'light_hammer',
            'cost'       => 2,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Mace',
            'code'       => 'mace',
            'cost'       => 5,
            'weight'     => 4,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Quarterstaff',
            'code'       => 'quarterstaff',
            'cost'       => 2,
            'weight'     => 4,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Sickle',
            'code'       => 'sickle',
            'cost'       => 1,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Spear',
            'code'       => 'spear',
            'cost'       => 1,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);


        /**
         *
         * Insert Simple Ranged Weapons
         *
         */

        Item::create([
            'name'       => 'Light Crossbow',
            'code'       => 'light_crossbow',
            'cost'       => 25,
            'weight'     => 5,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Dart',
            'code'       => 'dart',
            'cost'       => 5,
            'weight'     => 1,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Shortbow',
            'code'       => 'shortbow',
            'cost'       => 25,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Sling',
            'code'       => 'sling',
            'cost'       => 1,
            'weight'     => 0,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);


        /**
         *
         * Insert Martial Melee Weapons
         *
         */

        Item::create([
            'name'       => 'Battleaxe.',
            'code'       => 'battleaxe.',
            'cost'       => 10,
            'weight'     => 4,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Flail',
            'code'       => 'flail',
            'cost'       => 10,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Glaive',
            'code'       => 'glaive',
            'cost'       => 20,
            'weight'     => 6,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        $item = Item::create([
            'name'       => 'Great Axe',
            'code'       => 'great_axe',
            'cost'       => 30,
            'weight'     => 7,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);
        $action = new Action([
            'type' => 'damage',
            'dice_count' => 1,
        ]);
        $action->dice()->associate($dice->firstWhere('sides', 12));
        $item->actions()->save($action);

        Item::create([
            'name'       => 'Greatsword',
            'code'       => 'greatsword',
            'cost'       => 50,
            'weight'     => 6,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Halberd',
            'code'       => 'halberd',
            'cost'       => 20,
            'weight'     => 6,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Lance',
            'code'       => 'lance',
            'cost'       => 10,
            'weight'     => 6,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Longsword',
            'code'       => 'longsword',
            'cost'       => 15,
            'weight'     => 3,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Maul',
            'code'       => 'maul',
            'cost'       => 10,
            'weight'     => 10,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Morningstar',
            'code'       => 'morningstar',
            'cost'       => 15,
            'weight'     => 4,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Pike',
            'code'       => 'pike',
            'cost'       => 5,
            'weight'     => 18,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Rapier',
            'code'       => 'rapier',
            'cost'       => 25,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Scimitar',
            'code'       => 'scimitar',
            'cost'       => 25,
            'weight'     => 3,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Shortsword',
            'code'       => 'shortsword',
            'cost'       => 10,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Trident',
            'code'       => 'trident',
            'cost'       => 5,
            'weight'     => 4,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'War Pick',
            'code'       => 'war_pick',
            'cost'       => 5,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Warhammer.',
            'code'       => 'warhammer.',
            'cost'       => 15,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Whip',
            'code'       => 'whip',
            'cost'       => 2,
            'weight'     => 3,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_melee_item_subtype->id,
        ]);


        /**
         *
         * Insert Martial Ranged Weapons
         *
         */

        Item::create([
            'name'       => 'Hand Crossbow',
            'code'       => 'hand_crossbow',
            'cost'       => 75,
            'weight'     => 3,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Heavy Crossbow',
            'code'       => 'heavy_crossbow',
            'cost'       => 50,
            'weight'     => 18,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Longbow',
            'code'       => 'longbow',
            'cost'       => 50,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $martial_ranged_item_subtype->id,
        ]);
    }
}
