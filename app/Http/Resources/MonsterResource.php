<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MonsterResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'proficiency_bonus' => $this->proficiency_bonus,
            'hp' => [
                'base' => $this->base_hp,
                'hp_die_id' => $this->hp_die_id,
                'hp_die' => $this->hp_die->sides,
                'hp_die_count' => $this->hp_die_count,
                'as_string' => $this->hp_to_string(),
                'average' => $this->average_hp
            ],
            'armor' => [
                'id' => $this->armor->id,
                'name' => $this->armor->name,
                'class' => $this->armor->getArmorClass($this->resource),
            ],
            'speed' => $this->speed,
            'abilities' => [
                'strength' => [
                    'score' => $this->strength,
                    'modifier' => $this->strength_modifier
                ],
                'dexterity' => [
                    'score' => $this->dexterity,
                    'modifier' => $this->dexterity_modifier
                ],
                'constitution' => [
                    'score' => $this->constitution,
                    'modifier' => $this->constitution_modifier
                ],
                'intelligence' => [
                    'score' => $this->intelligence,
                    'modifier' => $this->intelligence_modifier
                ],
                'wisdom' => [
                    'score' => $this->wisdom,
                    'modifier' => $this->wisdom_modifier
                ],
                'charisma' => [
                    'score' => $this->charisma,
                    'modifier' => $this->charisma_modifier
                ],
            ],
            'challenge' => [
                'level' => $this->challenge->level,
                'xp' => $this->challenge->xp
            ],
            'weapons' => $this->weapons->map(
                function ($weapon) {
                    return [
                        'id' => $weapon->id,
                        'name' => $weapon->name,
                        // 'type' => $weapon->type->name,
                        'range' => $weapon->type->ranged ? 'ranged' : 'melee',
                        'damage' => [
                            'die' => $weapon->damage_dice->sides,
                            'die_count' => $weapon->dice_count,
                            'as_string' => $weapon->damage_to_string()
                        ],
                    ];
                }
            ),
            'languages' => $this->languages->map(
                function ($language) {
                    return [
                        'id' => $language->id,
                        'name' => $language->name,
                        'script' => $language->script->name,
                    ];
                }
            )
        ];
    }
}
