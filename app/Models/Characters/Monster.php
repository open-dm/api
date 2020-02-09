<?php

namespace App\Models\Characters;

use App\Models\Monster\Challenge;
use App\Models\Characters\Character;
use App\Models\Language\Language;
use App\Models\Core\Skill;
use App\Models\Items\Item;
use App\Traits\CharacterSkillsTrait;

class Monster extends Character
{
    use CharacterSkillsTrait;

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

    public function skills()
    {
        return $this->belongsToMany(Skill::class)->withPivot('bonus');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function getArmorAttribute()
    {
        return $this->items()
            ->whereHas('type', function ($type) {
                $type->where('code', 'armor');
            })
            ->where('item_monster.equipped', true)
            ->whereDoesntHave('subtype', function ($subtype) {
                $subtype->where('code', 'shield');
            })
            ->first();
    }

    public function getShieldAttribute()
    {
        return $this->items()
            ->whereHas('type', function ($type) {
                $type->where('code', 'armor')
                    ->where('equipped', true);
            })
            ->whereHas('subtype', function ($subtype) {
                $subtype->where('code', 'shield');
            })
            ->first();
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

    function getSkillBonus(string $skill_name)
    {
        $skill = $this->skills()->where('code', '=', $skill_name)->first();

        return $skill ? $skill->pivot->bonus : 0;
    }

    public function getArmorModifiers()
    {
       return $this->items()
            ->with('modifiers')
            ->where('item_monster.equipped', true)
            ->whereHas('type', function ($type) {
                $type->where('code', 'armor');
            })
            ->whereHas('modifiers', function ($modifiers) {
                $modifiers->where('type', 'stat')
                    ->where('code', 'armor_class');
            })
            ->get()
            ->pluck('modifiers')
            ->collapse()
            ->filter(function ($modifier) {
                return $modifier->type === 'stat' && $modifier->code === 'armor_class';
            });
    }
}
