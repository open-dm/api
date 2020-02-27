<?php

use App\Models\Characters\Monster;

class OwlBearSeeder extends CharacterSeeder
{
    public function run()
    {
        $character = new Monster([
            'name'            => 'Owlbear',
            'speed'           => 40,
            'size'            => 'large',
            'race'            => 'monstrosity',
            'alignment'       => null,
            'challenge'       => 3,
            'base_hit_points' => 21,

            'hit_point_dice'       => 10,
            'hit_point_dice_count' => 7,

            'is_template' => true,
        ]);

        $character->save();

        $character->abilities = [
            'strength' => 20,
            'dexterity' => 12,
            'constitution' => 17,
            'intelligence' => 3,
            'wisdom' => 12,
            'charisma' => 7,
        ];

        $character->skills = [
            'perception' => 3,
        ];

        $character->items = [];

        $character->languages = [];

        $character->senses = [
            'vision' => 10560,
            'darkvision' => 60,
        ];

        $character->environments = [
            'forest',
        ];

        $character->actions = [
            [
                'name' => 'Multiattack',
                'type' => 'multi',
            ],
            [
                'name' => 'Beak',
                'type' => 'damage',
                'dice_count' => 1,
                'dice' => 10,
                'bonus' => 5,
                'hit_bonus' => 7,
            ],
            [
                'name' => 'Claws',
                'type' => 'damage',
                'dice_count' => 2,
                'dice' => 8,
                'bonus' => 5,
                'hit_bonus' => 7,
            ],
        ];
    }
}
