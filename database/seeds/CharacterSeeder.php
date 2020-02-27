<?php

use App\Models\Core\Alignment;
use App\Models\Core\Challenge;
use App\Models\Core\Dice;
use App\Models\Core\Environment;
use App\Models\Core\Race;
use App\Models\Core\Size;
use App\Models\Items\Item;
use App\Models\Language\Language;
use App\Sense;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    protected static $dice;
    protected static $sizes;
    protected static $races;
    protected static $items;
    protected static $senses;
    protected static $languages;
    protected static $alignments;
    protected static $challenges;
    protected static $environments;

    public function __construct()
    {
        if (!isset(self::$dice))         self::$dice         = Dice::all();
        if (!isset(self::$sizes))        self::$sizes        = Size::all();
        if (!isset(self::$races))        self::$races        = Race::all();
        if (!isset(self::$items))        self::$items        = Item::all();
        if (!isset(self::$senses))       self::$senses       = Sense::all();
        if (!isset(self::$languages))    self::$languages    = Language::all();
        if (!isset(self::$alignments))   self::$alignments   = Alignment::all();
        if (!isset(self::$challenges))   self::$challenges   = Challenge::all();
        if (!isset(self::$environments)) self::$environments = Environment::all();
    }

    public function run()
    {
        $this->call([
            OrcSeeder::class,
            OwlBearSeeder::class,
            CopperDragonSeeder::class,
        ]);
    }
}
