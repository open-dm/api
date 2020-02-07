<?php

namespace App\Models\Armor;

use Illuminate\Database\Eloquent\Model;
use App\Models\Characters\Character;

class Armor extends Model
{
    protected $table = 'armor';

    public function getArmorClass(Character $character) {
        $armor_class = $this->base_armor;

        if ($this->apply_dex_modifier) {
            if ($this->dex_cap) {
                $armor_class += min(
                    $this->dex_cap,
                    $character->dexterity_modifier
                );
            } else {
                $armor_class += $character->dexterity_modifier;
            }
        }

        return $armor_class;
    }
}
