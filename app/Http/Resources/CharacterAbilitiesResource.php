<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CharacterAbilitiesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'strength' => [
                'score' => $this->strength,
                'modifier' => $this->strength_modifier,
                'skills' => [
                    'athletics' => $this->athletics,
                ],
            ],
            'dexterity' => [
                'score' => $this->dexterity,
                'modifier' => $this->dexterity_modifier,
                'skills' => [
                    'acrobatics' => $this->acrobatics,
                    'sleight_of_hand' => $this->sleight_of_hand,
                    'stealth' => $this->stealth
                ],
            ],
            'constitution' => [
                'score' => $this->constitution,
                'modifier' => $this->constitution_modifier,
                // there are no constitution skills, but add an empty array for consistency
                'skills' => [],
            ],
            'intelligence' => [
                'score' => $this->intelligence,
                'modifier' => $this->intelligence_modifier,
                'skills' => [
                    'arcana' => $this->arcana,
                    'history' => $this->history,
                    'investigation' => $this->investigation,
                    'nature' => $this->nature,
                    'religion' => $this->religion
                ],
            ],
            'wisdom' => [
                'score' => $this->wisdom,
                'modifier' => $this->wisdom_modifier,
                'skills' => [
                    'animal_handling' => $this->animal_handling,
                    'insight' => $this->insight,
                    'medicine' => $this->medicine,
                    'perception' => $this->perception,
                    'survival' => $this->survival
                ],
            ],
            'charisma' => [
                'score' => $this->charisma,
                'modifier' => $this->charisma_modifier,
                'skills' => [
                    'deception' => $this->deception,
                    'intimidation' => $this->intimidation,
                    'performance' => $this->performance,
                    'persuasion' => $this->persuasion
                ],
            ],
        ];
    }
}
