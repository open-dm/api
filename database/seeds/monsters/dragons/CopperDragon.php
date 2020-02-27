<?php

use App\Models\Characters\Monster;

class CopperDragonSeeder extends CharacterSeeder
{
    public function run()
    {
        $character = new Monster([
            'name'            => 'Young Copper Dragon',
            'speed'           => 40,
            'size'            => 'large',
            'race'            => 'dragon',
            'alignment'       => 'chaotic_good',
            'challenge'       => 7,
            'base_hit_points' => 42,

            'hit_point_dice'       => 10,
            'hit_point_dice_count' => 14,

            'is_template' => true,
        ]);

        $character->save();

        $character->abilities = [
            'strength' => 19,
            'dexterity' => 12,
            'constitution' => 17,
            'intelligence' => 16,
            'wisdom' => 13,
            'charisma' => 15,
        ];

        $character->skills = [
            'deception' => 5,
            'perception' => 7,
            'stealth' => 4,
        ];

        $character->items = [];

        $character->languages = [
            'common',
            'draconic',
        ];

        $character->senses = [
            'vision' => 10560,
            'blindsight' => 30,
            'darkvision' => 120,
        ];

        $character->environments = [
            'hill',
        ];

        $character->actions = [
            [
                'name' => 'Multiattack',
                'type' => 'multi',
            ],
            [
                'name' => 'Bite',
                'type' => 'damage',
                'dice_count' => 2,
                'dice' => 10,
                'bonus' => 4,
                'hit_bonus' => 7,
            ],
            [
                'name' => 'Claw',
                'type' => 'damage',
                'dice_count' => 2,
                'dice' => 6,
                'bonus' => 4,
                'hit_bonus' => 7,
            ],
            [
                'name' => 'Acid Breath',
                'type' => 'damage',
                'dice_count' => 9,
                'dice' => 8,
            ],
            [
                'name' => 'Slowing Breath',
                'type' => 'damage',
            ],
        ];
    }
}
