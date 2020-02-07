<?php

namespace App\Models\Characters;

use App\Models\Monster\Challenge;
use App\Models\Characters\Character;

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
