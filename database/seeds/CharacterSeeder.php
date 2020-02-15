<?php

use App\Models\Characters\Monster;
use App\Models\Characters\Player;
use App\Models\Core\Alignment;
use App\Models\Core\Dice;
use App\Models\Core\Race;
use App\Models\Core\Size;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        $dice = Dice::all();
        $sizes = Size::all();
        $races = Race::all();
        $alignments = Alignment::all();



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

        $character->size()->associate($sizes->firstWhere('code', 'medium'));
        $character->race()->associate($races->firstWhere('code', 'orc'));
        $character->alignment()->associate($alignments->firstWhere('code', 'chaotic_evil'));
        $character->hp_dice()->associate($dice->firstWhere('sides', 6));

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

        $character->size()->associate($sizes->firstWhere('code', 'medium'));
        $character->race()->associate($races->firstWhere('code', 'human'));
        $character->alignment()->associate($alignments->firstWhere('code', 'chaotic_evil'));
        $character->hp_dice()->associate($dice->firstWhere('sides', 6));

        $character->save();
    }
}
