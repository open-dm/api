<?php

use App\Models\Characters\Monster;

class OrcSeeder extends CharacterSeeder
{
    public function run()
    {
        $character = new Monster([
            'name'            => 'Orc',
            'speed'           => 30,
            'size'            => 'medium',
            'race'            => 'orc',
            'alignment'       => 'chaotic_evil',
            'challenge'       => 3,
            'base_hit_points' => 6,

            'hit_point_dice'       => 8,
            'hit_point_dice_count' => 2,

            'is_template' => true,
        ]);

        $character->save();

        $character->abilities = [
            'strength' => 16,
            'dexterity' => 12,
            'constitution' => 16,
            'intelligence' => 7,
            'wisdom' => 11,
            'charisma' => 10,
        ];

        $character->skills = [
            'intimidation' => 2,
        ];

        $character->items = [
            'hide' => [
                'equipped' => true,
            ],
            'great_axe' => [
                'equipped' => true,
            ],
            'javelin' => [
                'equipped' => true,
            ],
        ];

        $character->languages = [
            'common',
            'orc',
        ];

        $character->senses = [
            'vision' => 10560,
            'darkvision' => 60,
        ];

        $character->environments = [
            'arctic',
            'forest',
            'grassland',
            'hill',
            'mountain',
            'swamp',
            'underdark',
        ];
    }
}
