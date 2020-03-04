<?php

use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            OrcSeeder::class,
            OwlBearSeeder::class,
            CopperDragonSeeder::class,
        ]);
    }
}
