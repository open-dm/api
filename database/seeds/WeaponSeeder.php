<?php

use Illuminate\Database\Seeder;

class WeaponSeeder extends Seeder
{
    public function run()
    {
        DB::table('item_types')->truncate();
        DB::table('item_subtypes')->truncate();
        DB::table('items')->truncate();

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
            'cost'       => 1,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Dagger',
            'cost'       => 2,
            'weight'     => 1,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Greatclub',
            'cost'       => 2,
            'weight'     => 10,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Handaxe',
            'cost'       => 5,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Javelin',
            'cost'       => 5,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Light Hammer',
            'cost'       => 2,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Mace',
            'cost'       => 5,
            'weight'     => 4,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Quarterstaff',
            'cost'       => 2,
            'weight'     => 4,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Sickle',
            'cost'       => 1,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_melee_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Spear',
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
            'cost'       => 25,
            'weight'     => 5,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Dart',
            'cost'       => 5,
            'weight'     => 1,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Shortbow',
            'cost'       => 25,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Sling',
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
            'cost'       => 10,
            'weight'     => 4,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Flail',
            'cost'       => 10,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Glaive',
            'cost'       => 20,
            'weight'     => 6,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'GreatAxe',
            'cost'       => 30,
            'weight'     => 7,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Greatsword',
            'cost'       => 50,
            'weight'     => 6,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Halberd',
            'cost'       => 20,
            'weight'     => 6,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Lance',
            'cost'       => 10,
            'weight'     => 6,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Longsword',
            'cost'       => 15,
            'weight'     => 3,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Maul',
            'cost'       => 10,
            'weight'     => 10,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Morningstar',
            'cost'       => 15,
            'weight'     => 4,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Pike',
            'cost'       => 5,
            'weight'     => 18,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Rapier',
            'cost'       => 25,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Scimitar',
            'cost'       => 25,
            'weight'     => 3,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Shortsword',
            'cost'       => 10,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Trident',
            'cost'       => 5,
            'weight'     => 4,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'War Pick',
            'cost'       => 5,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Warhammer.',
            'cost'       => 15,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Whip',
            'cost'       => 2,
            'weight'     => 3,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);


        /**
         *
         * Insert Martial Ranged Weapons
         *
         */

        Item::create([
            'name'       => 'Hand Crossbow',
            'cost'       => 75,
            'weight'     => 3,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Heavy Crossbow',
            'cost'       => 50,
            'weight'     => 18,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Longbow',
            'cost'       => 50,
            'weight'     => 2,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Toaster',
            'cost'       => 99999,
            'weight'     => 1,
            'type_id'    => $weapon_item_type->id,
            'subtype_id' => $simple_ranged_item_subtype->id,
        ]);
    }
}
