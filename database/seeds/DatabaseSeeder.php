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
            RaceSeeder::class,
            SkillSeeder::class,
            ChallengeSeeder::class,
            LanguageSeeder::class,
            AlignmentSeeder::class,
            DamageTypeSeeder::class,
            EnvironmentSeeder::class,
            CharacterSeeder::class,
        ]);
    }
}
