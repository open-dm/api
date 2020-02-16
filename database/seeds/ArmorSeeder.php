<?php

use Illuminate\Database\Seeder;

use App\Models\Items\Item;
use App\Models\Items\ItemSubtype;
use App\Models\Items\ItemType;

class ArmorSeeder extends Seeder
{
    public function run()
    {
        /**
         *
         * Insert Armor Type
         *
         */

        $armor_item_type = ItemType
            ::where('code', 'armor')
            ->firstOrCreate([
                'name' => 'Armor',
                'code' => 'armor',
            ]);


        /**
         *
         * Insert Armor SubTypes
         *
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
         *
         * Insert Light Armors
         *
         */
        Item::create([
            'name'       => 'Padded',
            'code'       => 'Padded',
            'cost'       => 5,
            'weight'     => 8,
            'type_id'    => $armor_item_type->id,
            'subtype_id' => $light_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Leather',
            'code'       => 'Leather',
            'cost'       => 10,
            'weight'     => 10,
            'type_id'    => $armor_item_type->id,
            'subtype_id' => $light_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Studded Leather',
            'code'       => 'studded_leather',
            'cost'       => 45,
            'weight'     => 13,
            'type_id'    => $armor_item_type->id,
            'subtype_id' => $light_item_subtype->id,
        ]);


        /**
         *
         * Insert Medium Armors
         *
         */

        Item::create([
            'name'       => 'Hide',
            'code'       => 'hide',
            'cost'       => 10,
            'weight'     => 12,
            'type_id'    => $armor_item_type->id,
            'subtype_id' => $medium_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Chain Shirt',
            'code'       => 'chain_shirt',
            'cost'       => 50,
            'weight'     => 13,
            'type_id'    => $armor_item_type->id,
            'subtype_id' => $medium_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Scale Mail',
            'code'       => 'scale_mail',
            'cost'       => 50,
            'weight'     => 45,
            'type_id'    => $armor_item_type->id,
            'subtype_id' => $medium_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Breastplate',
            'code'       => 'breastplate',
            'cost'       => 400,
            'weight'     => 20,
            'type_id'    => $armor_item_type->id,
            'subtype_id' => $medium_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Half Plate',
            'code'       => 'half_plate',
            'cost'       => 750,
            'weight'     => 40,
            'type_id'    => $armor_item_type->id,
            'subtype_id' => $medium_item_subtype->id,
        ]);


        /**
         *
         * Insert Heavy Armors
         *
         */

        Item::create([
            'name'       => 'Ring Mail',
            'code'       => 'ring_mail',
            'cost'       => 30,
            'weight'     => 40,
            'type_id'    => $armor_item_type->id,
            'subtype_id' => $heavy_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Chain Mail',
            'code'       => 'chain_mail',
            'cost'       => 75,
            'weight'     => 55,
            'type_id'    => $armor_item_type->id,
            'subtype_id' => $heavy_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Splint',
            'code'       => 'splint',
            'cost'       => 200,
            'weight'     => 60,
            'type_id'    => $armor_item_type->id,
            'subtype_id' => $heavy_item_subtype->id,
        ]);

        Item::create([
            'name'       => 'Plate',
            'code'       => 'plate',
            'cost'       => 1500,
            'weight'     => 65,
            'type_id'    => $armor_item_type->id,
            'subtype_id' => $heavy_item_subtype->id,
        ]);


        /**
         *
         * Insert Shields
         *
         */

        Item::create([
            'name'       => 'Shield',
            'code'       => 'shield',
            'cost'       => 10,
            'weight'     => 6,
            'type_id'    => $armor_item_type->id,
            'subtype_id' => $shield_item_subtype->id,
        ]);
    }
}
