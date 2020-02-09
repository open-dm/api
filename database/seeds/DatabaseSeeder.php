<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            DiceSeeder::class,
            ItemSeeder::class,
            AlignmentSeeder::class,
        ]);
    }
}
