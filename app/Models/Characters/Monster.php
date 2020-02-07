<?php

namespace App\Models\Characters;

use App\Models\Monster\Challenge;
use App\Models\Characters\Character;
use App\Models\Language\Language;
use App\Models\Core\Skill;

class Monster extends Character
{
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

    public function getPassivePerceptionAttribute()
    {
        return 10 + $this->perception_score;
    }

    function getAthleticsAttribute()
    {
        $score = $this->strength_modifier;

        return $score + $this->getSkillBonus('athletics');
    }

    function getAcrobaticsAttribute()
    {
        $score = $this->dexterity_modifier;

        return $score + $this->getSkillBonus('acrobatics');
    }

    function getSleightOfHandAttribute()
    {
        $score = $this->dexterity_modifier;

        return $score + $this->getSkillBonus('sleight_of_hand');
    }

    function getStealthAttribute()
    {
        $score = $this->dexterity_modifier;

        return $score + $this->getSkillBonus('stealth');
    }

    function getArcanaAttribute()
    {
        $score = $this->intelligence_modifier;

        return $score + $this->getSkillBonus('arcana');
    }

    function getHistoryAttribute()
    {
        $score = $this->intelligence_modifier;

        return $score + $this->getSkillBonus('history');
    }

    function getInvestigationAttribute()
    {
        $score = $this->intelligence_modifier;

        return $score + $this->getSkillBonus('investigation');
    }

    function getNatureAttribute()
    {
        $score = $this->intelligence_modifier;

        return $score + $this->getSkillBonus('nature');
    }

    function getReligionAttribute()
    {
        $score = $this->intelligence_modifier;

        return $score + $this->getSkillBonus('religion');
    }

    function getAnimalHandlingAttribute()
    {
        $score = $this->wisdom_modifier;

        return $score + $this->getSkillBonus('animal_handling');
    }

    function getInsightAttribute()
    {
        $score = $this->wisdom_modifier;

        return $score + $this->getSkillBonus('insight');
    }

    function getMedicineAttribute()
    {
        $score = $this->wisdom_modifier;

        return $score + $this->getSkillBonus('medicine');
    }

    function getPerceptionAttribute()
    {
        $score = $this->wisdom_modifier;

        return $score + $this->getSkillBonus('perception');
    }

    function getSurvivalAttribute()
    {
        $score = $this->wisdom_modifier;

        return $score + $this->getSkillBonus('survival');
    }

    function getDeceptionAttribute()
    {
        $score = $this->charisma_modifier;

        return $score + $this->getSkillBonus('deception');
    }

    function getIntimidationAttribute()
    {
        $score = $this->charisma_modifier;

        return $score + $this->getSkillBonus('intimidation');
    }

    function getPerformanceAttribute()
    {
        $score = $this->charisma_modifier;

        return $score + $this->getSkillBonus('performance');
    }

    function getPersuasionAttribute()
    {
        $score = $this->charisma_modifier;

        return $score + $this->getSkillBonus('persuasion');
    }

    function getSkillBonus(string $skill_name)
    {
        $skill = $this->skills()->where('name', '=', $skill_name)->first();

        return $skill ? $skill->pivot->bonus : 0;
    }
}
