<?php

namespace App\Models\Characters;

use App\Models\Monster\Challenge;

class Monster extends Character
{
    protected static $singleTableType = 'monster';

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }
}
