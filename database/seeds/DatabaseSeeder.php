<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SizeSeeder::class,
            DiceSeeder::class,
            ItemSeeder::class,
            LanguageSeeder::class,
            AlignmentSeeder::class,
        ]);
    }
}
