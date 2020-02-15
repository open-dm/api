<?php

namespace App\Models\Characters;

use App\Models\Core\Environment;
use App\Models\Core\Race;
use App\Models\Core\Size;
use App\Models\Core\Dice;
use App\Models\Core\Alignment;
use App\Models\Core\Skill;
use App\Models\Items\Item;
use App\Models\Language\Language;
use App\Traits\CharacterSkillsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\Traits\SearchableTrait;
use App\Traits\FilterableTrait;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

class Character extends Model
{
    use CharacterSkillsTrait;
    use SingleTableInheritanceTrait;
    use SearchableTrait;
    use FilterableTrait;

    protected $table = 'characters';

    protected static $singleTableType = 'unknown';
    protected static $singleTableTypeField = 'type';
    protected static $singleTableSubclasses = [Monster::class, Player::class];

    public $guarded = ['id'];

    public $filterable_fields = [
        'alignment' => 'code',
        'size' => 'name',
    ];

    /** BEGIN RELATIONS */
    public function languages()
    {
        return $this->belongsToMany(
            Language::class,
            'character_languages',
            'character_id'
        );
    }

    public function environment()
    {
        return $this->belongsTo(Environment::class);
    }

    public function alignment()
    {
        return $this->belongsTo(Alignment::class);
    }

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function hp_dice()
    {
        return $this->belongsTo(Dice::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class)->withPivot('bonus');
    }

    /** END RELATIONS */

    public function getAbilityModifiersAttribute()
    {
        return Arr::only(
            $this->toArray(),
            [
                'speed',
                'strength',
                'dexterity',
                'constitution',
                'intelligence',
                'wisdom',
                'charisma',
            ]
        );
    }

    public function setAbilitiesAttribute($value)
    {
        $this->fill(
            Arr::only(
                $value,
                [
                    'speed',
                    'strength',
                    'dexterity',
                    'constitution',
                    'intelligence',
                    'wisdom',
                    'charisma',
                ]
            )
        );
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

    public function getSkillBonus(string $skill_name)
    {
        $skill = $this->skills()
            ->where('code', $skill_name)
            ->first();

        return $skill ? $skill->pivot->bonus : 0;
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

    public function getWeaponsAttribute()
    {
        return $this->items()
            ->with(['actions'])
            ->whereHas('type', function ($type) {
                $type->where('code', 'weapon');
            })
            ->where('item_monster.equipped', true)
            ->get();
    }

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