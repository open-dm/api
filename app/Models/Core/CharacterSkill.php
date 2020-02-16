<?php

namespace App\Models\Core;

use App\Models\Characters\Character;
use Illuminate\Database\Eloquent\Model;

class CharacterSkill extends Model
{
    protected $table = 'character_skills';

    public $timestamps = false;

    public $guarded = ['id'];

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function setSkillAttribute(string $skill_code)
    {
        $this->skill()->associate(Skill::findByCode($skill_code));
    }

    public function getScoreAttribute()
    {
        // TODO: A character skill bonus is equal to their proficiency bonus, plus any class or race based bonuses
        return $this->bonus + $this->character->proficiency_bonus;
    }

    public function getNameAttribute()
    {
        return $this->skill->name;
    }

    public function getCodeAttribute()
    {
        return $this->skill->code;
    }
}
