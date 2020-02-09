<?php

use App\Models\Items\Item;
use App\Models\Items\ItemSubtype;
use App\Models\Items\ItemType;
use Illuminate\Database\Seeder;

class ArmorSeeder extends Seeder
{
    public function run()
    {
        // DB::table('item_types')->truncate();
        // DB::table('item_subtypes')->truncate();
        // DB::table('items')->truncate();

        /**
         * Insert Armor Type
         */
        $armor_item_type = ItemType
            ::where('code', 'armor')
            ->firstOrCreate([
                'name' => 'Armor',
                'code' => 'armor',
            ]);

        /**
         * Insert Armor SubTypes
         */
        $light_item_subtype = ItemSubtype
            ::where('code', 'light')
            ->firstOrCreate([
                'name' => 'Light',
                'code' => 'light',
            ]);

        $medium_item_subtype = ItemSubtype
            ::where('code', 'medium')
            ->firstOrCreate([
                'name' => 'Medium',
                'code' => 'medium',
            ]);

        $heavy_item_subtype = ItemSubtype
            ::where('code', 'heavy')
            ->firstOrCreate([
                'name' => 'Heavy',
                'code' => 'heavy',
            ]);

        $shield_item_subtype = ItemSubtype
            ::where('code', 'shield')
            ->firstOrCreate([
                'name' => 'Shield',
                'code' => 'shield',
            ]);

        /**
         * Insert Armors
         */
        $padded_armor = Item
            ::create([
                'name'       => 'Padded',
                'cost'       => 5,
                'weight'     => 8,
                'type_id'    => $armor_item_type->id,
                'subtype_id' => $light_item_subtype->id,
            ]);

        $padded_armor = Item
            ::create([
                'name'       => 'Leather',
                'cost'       => 10,
                'weight'     => 10,
                'type_id'    => $armor_item_type->id,
                'subtype_id' => $light_item_subtype->id,
            ]);

        $padded_armor = Item
            ::create([
                'name'       => 'Studded Leather',
                'cost'       => 45,
                'weight'     => 13,
                'type_id'    => $armor_item_type->id,
                'subtype_id' => $light_item_subtype->id,
            ]);

        $padded_armor = Item
            ::create([
                'name'       => 'Hide',
                'cost'       => 10,
                'weight'     => 12,
                'type_id'    => $armor_item_type->id,
                'subtype_id' => $medium_item_subtype->id,
            ]);

        $padded_armor = Item
            ::create([
                'name'       => 'Chain Shirt',
                'cost'       => 50,
                'weight'     => 13,
                'type_id'    => $armor_item_type->id,
                'subtype_id' => $medium_item_subtype->id,
            ]);

        $padded_armor = Item
            ::create([
                'name'       => 'Scale Mail',
                'cost'       => 50,
                'weight'     => 45,
                'type_id'    => $armor_item_type->id,
                'subtype_id' => $medium_item_subtype->id,
            ]);

        $padded_armor = Item
            ::create([
                'name'       => 'Breastplate',
                'cost'       => 400,
                'weight'     => 20,
                'type_id'    => $armor_item_type->id,
                'subtype_id' => $medium_item_subtype->id,
            ]);

        $padded_armor = Item
            ::create([
                'name'       => 'Half Plate',
                'cost'       => 750,
                'weight'     => 40,
                'type_id'    => $armor_item_type->id,
                'subtype_id' => $medium_item_subtype->id,
            ]);

        $padded_armor = Item
            ::create([
                'name'       => 'Ring Mail',
                'cost'       => 30,
                'weight'     => 40,
                'type_id'    => $armor_item_type->id,
                'subtype_id' => $heavy_item_subtype->id,
            ]);

        $padded_armor = Item
            ::create([
                'name'       => 'Chain Mail',
                'cost'       => 75,
                'weight'     => 55,
                'type_id'    => $armor_item_type->id,
                'subtype_id' => $heavy_item_subtype->id,
            ]);

        $padded_armor = Item
            ::create([
                'name'       => 'Splint',
                'cost'       => 200,
                'weight'     => 60,
                'type_id'    => $armor_item_type->id,
                'subtype_id' => $heavy_item_subtype->id,
            ]);

        $padded_armor = Item
            ::create([
                'name'       => 'Plate',
                'cost'       => 1500,
                'weight'     => 65,
                'type_id'    => $armor_item_type->id,
                'subtype_id' => $heavy_item_subtype->id,
            ]);

        $padded_armor = Item
            ::create([
                'name'       => 'Shield',
                'cost'       => 10,
                'weight'     => 6,
                'type_id'    => $armor_item_type->id,
                'subtype_id' => $shield_item_subtype->id,
            ]);
    }
}
