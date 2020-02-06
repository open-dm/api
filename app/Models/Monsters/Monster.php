<?php

namespace App\Models\Monsters;

use App\Models\Core\Size;
use App\Models\Core\Dice;
use App\Models\Armor\Armor;
use App\Models\Monster\Challenge;
use App\Models\Weapons\Weapon;
use App\Models\Core\Character;

class Monster extends Character
{
    protected $table = 'monsters';

    /** START RELATIONS */

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    /** END RELATIONS */
}
