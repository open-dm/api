<?php

namespace App\Models\Characters;

use App\Models\Monster\Challenge;
use App\Models\Characters\Character;
use App\Models\Language\Language;

class Monster extends Character
{
    protected $table = 'monsters';

    /** START RELATIONS */

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    /** END RELATIONS */

    public function getProficiencyBonusAttribute()
    {
        /**
         * proficiency bonus starts at 2 and goes up by 1 at level 5 and every
         * 4 levels thereafter. The formula for proficiency bonus is therefore:
         *
         * 1 + lvl / 4 rounded up
         */
        return ceil(1 + ($this->challenge->level / 4));
    }
}
