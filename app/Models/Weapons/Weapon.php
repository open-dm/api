<?php

namespace App\Models\Weapons;

use Illuminate\Database\Eloquent\Model;
use App\Models\Core\Dice;

class Weapon extends Model
{
    protected $table = 'weapons';

    public function type()
    {
        return $this->belongsTo(WeaponType::class, 'weapon_type_id');
    }

    public function damage_dice()
    {
        return $this->belongsTo(Dice::class);
    }

    public function damage_to_string()
    {
        $die = "{$this->dice_count}d{$this->damage_dice->sides}";
        return "$die + BONUS";
    }
}
