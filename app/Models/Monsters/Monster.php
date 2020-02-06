<?php

namespace App\Models\Monsters;

use App\Models\Monster\Challenge;
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
