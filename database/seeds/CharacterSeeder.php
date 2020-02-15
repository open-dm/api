<?php

use App\Models\Characters\Monster;
use App\Models\Characters\Player;
use App\Models\Core\Alignment;
use App\Models\Core\Challenge;
use App\Models\Core\Dice;
use App\Models\Core\Race;
use App\Models\Core\Size;
use App\Models\Items\Item;
use App\Models\Language\Language;
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
            'base_hp' => 6,
            'speed' => 30,
            'strength' => 16,
            'dexterity' => 12,
            'constitution' => 16,
            'intelligence' => 7,
            'wisdom' => 11,
            'charisma' => 10,
            'hp_dice_count' => 2,
            'is_template' => true,
        ]);

        $character->size()->associate($sizes->firstWhere('code', 'medium'));
        $character->race()->associate($races->firstWhere('code', 'orc'));
        $character->alignment()->associate($alignments->firstWhere('code', 'chaotic_evil'));
        $character->hp_dice()->associate($dice->firstWhere('sides', 8));

        $character->save();

        $character->items()->attach([
            Item::firstWhere('name', 'Hide')->id,
            Item::firstWhere('name', 'Great Axe')->id,
            Item::firstWhere('name', 'Javelin')->id
        ], ['equipped' => true]);
        $character->languages()->attach([
            1,
            8
        ]);

        $character = new Monster([
            'name' => 'Owlbear',
            'base_hp' => 21,
            'speed' => 40,
            'strength' => 20,
            'dexterity' => 12,
            'constitution' => 17,
            'intelligence' => 3,
            'wisdom' => 12,
            'charisma' => 7,
            'hp_dice_count' => 7,
            'is_template' => true,
        ]);

        $character->size()->associate(Size::findByCode('large'));
        $character->race()->associate($races->firstWhere('code', 'owlbear'));
        $character->hp_dice()->associate(Dice::find(4));
        $character->challenge()->associate(Challenge::find(7));

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
