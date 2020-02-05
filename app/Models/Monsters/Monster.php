<?php

namespace App\Models\Monsters;

use Illuminate\Database\Eloquent\Model;
use App\Models\Core\Size;
use App\Models\Core\Dice;
use App\Models\Armor\Armor;
use App\Models\Monster\Challenge;
use App\Models\Weapons\Weapon;

class Monster extends Model
{
    protected $table = 'monsters';

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function hp_die()
    {
        return $this->belongsTo(Dice::class);
    }

    public function armor()
    {
        return $this->belongsTo(Armor::class);
    }

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function weapons()
    {
        return $this->belongsToMany(Weapon::class);
    }

    /**
     * END RELATIONS
     */

    public function hp_to_string()
    {
        $die = "{$this->hp_die_count}d{$this->hp_die->sides}";
        return "$die + $this->base_hp";
    }

    public function getAverageHpAttribute()
    {
        $min = $this->hp_die_count;
        $max = $this->hp_die_count * $this->hp_die->sides;
        return (int) floor($min + (($max - $min) / 2));
    }

    public function getStrengthModifierAttribute()
    {
        return $this->abilityScoreToModifier($this->strength);
    }

    public function getDexterityModifierAttribute()
    {
        return $this->abilityScoreToModifier($this->dexterity);
    }

    public function getConstitutionModifierAttribute()
    {
        return $this->abilityScoreToModifier($this->constitution);
    }

    public function getIntelligenceModifierAttribute()
    {
        return $this->abilityScoreToModifier($this->intelligence);
    }

    public function getWisdomModifierAttribute()
    {
        return $this->abilityScoreToModifier($this->wisdom);
    }

    public function getCharismaModifierAttribute()
    {
        return $this->abilityScoreToModifier($this->charisma);
    }

    private function abilityScoreToModifier($ability_score)
    {
        return (int) floor(($ability_score - 10) / 2);
    }
}
