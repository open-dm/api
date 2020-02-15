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
            'size' => new SizeResource($this->size),
            'alignment' => $this->alignment ? new AlignmentResource($this->alignment) : null,
            'proficiency_bonus' => $this->proficiency_bonus,
            'hp' => [
                'base' => $this->base_hp,
                'hp_dice_id' => $this->hp_dice_id,
                'hp_dice' => $this->hp_dice->sides,
                'hp_dice_count' => $this->hp_dice_count,
                'as_string' => $this->hp_to_string(),
                'average' => $this->average_hp
            ],
            'armor' => [
                'id' => $this->armor->id,
                'name' => $this->armor->name,
                'class' => $this->armor_class
            ],
            'shield' => $this->shield ? [
                'id' => $this->shield->id,
                'name' => $this->shield->name,
            ] : null,
            'speed' => $this->speed,
            'abilities' => new CharacterAbilitiesResource($this),
            'challenge' => [
                'level' => $this->challenge->level,
                'xp' => $this->challenge->xp
            ],
            'actions' => [
                'weapons' => WeaponResource::collection($this->weapons)
            ],
            'languages' => LanguageResource::collection($this->languages),
            'passive_perception' => $this->passive_perception
        ];
    }
}
