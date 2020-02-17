<?php

namespace App\Models\Core;

use App\Models\Characters\Character;
use Illuminate\Database\Eloquent\Model;

class CharacterAbility extends Model
{
    protected $table = 'character_abilities';

    public $timestamps = false;

    public $guarded = ['id'];

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function ability()
    {
        return $this->belongsTo(Ability::class);
    }

    public function setAbilityAttribute(string $ability_code)
    {
        $this->ability()->associate(Ability::findByCode($ability_code));
    }

    public function getModifierAttribute()
    {
        return (int) floor(($this->score - 10) / 2);
    }

    public function getNameAttribute()
    {
        return $this->ability->name;
    }

    public function getCodeAttribute()
    {
        return $this->ability->code;
    }
}
