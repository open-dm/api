<?php

namespace App\Models\Armor;

use Illuminate\Database\Eloquent\Model;
use App\Models\Characters\Monster;

class Armor extends Model
{
    protected $table = 'armor';

    public function getArmorClass(Monster $monster) {
        $armor_class = $this->base_armor;

        if ($this->apply_dex_modifier) {
            if ($this->dex_cap) {
                $armor_class += min(
                    $this->dex_cap,
                    $monster->dexterity_modifier
                );
            } else {
                $armor_class += $monster->dexterity_modifier;
            }
        }

        return $armor_class;
    }
}
