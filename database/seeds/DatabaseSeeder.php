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
            SkillSeeder::class,
            LanguageSeeder::class,
            AlignmentSeeder::class,
            DamageTypeSeeder::class,
            CharacterTypeSeeder::class,
        ]);
    }
}
