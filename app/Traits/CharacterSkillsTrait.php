<?
namespace App\Traits;

trait CharacterSkillsTrait
{
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
        // TODO: A character skill bonus is equal to their proficiency bonus, plus any class or race based bonuses
        $skill = $this->skills()->where('name', '=', $skill_name)->first();

        return $skill ? $this->proficiency_bonus : 0;
    }
}