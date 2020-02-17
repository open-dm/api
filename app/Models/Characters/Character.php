<?php

namespace App\Models\Characters;

use App\Models\Core\CharacterAbility;
use App\Models\Core\CharacterSkill;
use App\Models\Core\Environment;
use App\Models\Core\Race;
use App\Models\Core\Size;
use App\Models\Core\Dice;
use App\Models\Core\Alignment;
use App\Models\Items\Action;
use App\Models\Items\Item;
use App\Models\Language\Language;
use App\Sense;
use App\Traits\CharacterSkillsTrait;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SearchableTrait;
use App\Traits\FilterableTrait;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

class Character extends Model
{
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

    /**
     *
     * BEGIN RELATIONS
     *
     */
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
        return $this->belongsToMany(
            Item::class,
            'character_items',
            'character_id'
        );
    }

    public function abilities()
    {
        return $this->hasMany(
            CharacterAbility::class,
            'character_id'
        )->with('ability');
    }

    public function skills()
    {
        return $this->hasMany(
            CharacterSkill::class,
            'character_id'
        )->with('skill');
    }

    public function actions()
    {
        return $this->morphMany(Action::class, 'object');
    }

    public function senses()
    {
        return $this->belongsToMany(
            Sense::class,
            'character_senses',
            'character_id'
        )->withPivot('distance');
    }

    /**
     *
     * END RELATIONS
     *
     */

    public function setAbilitiesAttribute(array $ability_codes = [])
    {
        $character_abilities = [];

        foreach ($ability_codes as $code => $score) {
            $character_abilities[] = new CharacterAbility([
                'ability' => $code,
                'score' => $score,
            ]);
        }

        $this->abilities()->saveMany($character_abilities);
    }

    public function setSkillsAttribute(array $skill_codes = [])
    {
        $character_skills = [];

        foreach ($skill_codes as $code => $bonus) {
            $character_skills[] = new CharacterSkill([
                'skill' => $code,
                'bonus' => $bonus,
            ]);
        }

        $this->skills()->saveMany($character_skills);
    }

    public function getAverageHpAttribute()
    {
        $min = $this->hp_dice_count;
        $max = $this->hp_dice_count * $this->hp_dice->sides;
        return $this->base_hp + (int) floor($min + (($max - $min) / 2));
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
            ->where('character_items.equipped', true)
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
            ->where('character_items.equipped', true)
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