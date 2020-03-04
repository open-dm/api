<?php

namespace App\Models\Characters;

 use App\Models\Core\Challenge;

 class Monster extends Character
{
    protected static $singleTableType = 'monster';

    /**
     *
     * Belongs To Relations
     *
     */
    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

     /**
      *
      * Relation Setters
      *
      */
     public function setChallengeAttribute($challenge) {
         $this->challenge()->associate(
             $challenge instanceof Challenge ?
                 $challenge :
                 Challenge::where('level', $challenge)->firstOrFail()
         );
     }
}
