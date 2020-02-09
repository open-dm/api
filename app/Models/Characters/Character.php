<?php

namespace App\Models\Characters;

use App\Models\Core\Size;
use App\Models\Core\Dice;
use App\Models\Core\Alignment;
use App\Models\Armor\Armor;
use App\Models\Weapons\Weapon;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    /** BEGIN RELATIONS */

    public function alignment()
    {
        return $this->belongsTo(Alignment::class);
    }

    public function armor()
    {
        return $this->belongsTo(Armor::class);
    }

    public function hp_dice()
    {
        return $this->belongsTo(Dice::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    /** END RELATIONS */

    public function hp_to_string()
    {
        $die = "{$this->hp_dice_count}d{$this->hp_dice->sides}";
        return "$die + $this->base_hp";
    }

    public function getAverageHpAttribute()
    {
        $min = $this->hp_dice_count;
        $max = $this->hp_dice_count * $this->hp_dice->sides;
        return $this->base_hp + (int) floor($min + (($max - $min) / 2));
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

    public function getArmorClassAttribute()
    {
        $armor_class = 10;

        return $this->armor
            ->modifiers()
            ->where('type', 'stat')
            ->where('code', 'armor_class')
            ->get()
            ->reduce(
                function ($carry, $modifier) {
                    return $modifier->apply_bonus(
                        $carry,
                        $this
                    );
                },
                $armor_class
            );
    }
}