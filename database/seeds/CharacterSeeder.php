<?php

use App\Models\Characters\Monster;
use App\Models\Characters\Player;
use App\Models\Core\Alignment;
use App\Models\Core\Challenge;
use App\Models\Core\Dice;
use App\Models\Core\Size;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        $character = new Monster([
            'name' => 'Orc',
            'base_hp' => 15,
            'speed' => 30,
            'strength' => 14,
            'dexterity' => 14,
            'constitution' => 14,
            'intelligence' => 14,
            'wisdom' => 14,
            'charisma' => 14,
            'hp_dice_count' => 2,
            'is_template' => true,
        ]);

        $character->size()->associate(Size::findByCode('medium'));
        $character->alignment()->associate(Alignment::findByCode('chaotic_evil'));
        $character->hp_dice()->associate(Dice::find(4));
        $character->challenge()->associate(Challenge::find(4));

        $character->save();



        $character = new Player([
            'name' => 'New Player',
            'base_hp' => 15,
            'speed' => 30,
            'strength' => 14,
            'dexterity' => 14,
            'constitution' => 14,
            'intelligence' => 14,
            'wisdom' => 14,
            'charisma' => 14,
            'hp_dice_count' => 2,
            'is_template' => true,
        ]);

        $character->size()->associate(Size::findByCode('large'));
        $character->alignment()->associate(Alignment::findByCode('chaotic_evil'));
        $character->hp_dice()->associate(Dice::find(4));

        $character->save();
    }
}
