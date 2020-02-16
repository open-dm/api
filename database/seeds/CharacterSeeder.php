<?php

use App\Models\Characters\Monster;
use App\Models\Characters\Player;
use App\Models\Core\Alignment;
use App\Models\Core\Challenge;
use App\Models\Core\Dice;
use App\Models\Core\Environment;
use App\Models\Core\Race;
use App\Models\Core\Size;
use App\Models\Items\Action;
use App\Models\Items\Item;
use App\Models\Language\Language;
use App\Sense;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        $dice = Dice::all();
        $sizes = Size::all();
        $races = Race::all();
        $items = Item::all();
        $senses = Sense::all();
        $languages = Language::all();
        $alignments = Alignment::all();
        $challenges = Challenge::all();
        $environments = Environment::all();



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
            $items->firstWhere('code', 'hide')->id,
            $items->firstWhere('code', 'great_axe')->id,
            $items->firstWhere('code', 'javelin')->id
        ], ['equipped' => true]);
        $character->languages()->attach([
            $languages->firstWhere('code', 'common')->id,
            $languages->firstWhere('code', 'orc')->id,
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

        $character->size()->associate($sizes->firstWhere('code', 'large'));
        $character->race()->associate($races->firstWhere('code', 'monstrosity'));
        $character->hp_dice()->associate($dice->firstWhere('sides', 10));
        $character->challenge()->associate($challenges->firstWhere('level', 3));
        $character->environment()->associate($environments->firstWhere('code', 'forest'));

        $character->save();

        $action = new Action([
            'name' => 'Claws',
            'type' => 'damage',
            'dice_count' => 1,
        ]);
        $action->dice()->associate($dice->firstWhere('sides', 10));
        $character->actions()->save($action);

        $action = new Action([
            'name' => 'Beak',
            'type' => 'damage',
            'dice_count' => 2,
        ]);
        $action->dice()->associate($dice->firstWhere('sides', 8));
        $character->actions()->save($action);

        $character->senses()->attach([
            $senses->firstWhere('code', 'darkvision')->id,
        ], ['distance' => 60]);



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
