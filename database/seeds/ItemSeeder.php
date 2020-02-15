<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run()
    {
        DB::table('items')->truncate();
        DB::table('item_types')->truncate();
        DB::table('item_subtypes')->truncate();

        $this->call([
            ArmorSeeder::class,
            WeaponSeeder::class,
        ]);
    }
}
