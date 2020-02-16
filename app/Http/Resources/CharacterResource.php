<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CharacterResource extends JsonResource
{
    public function toArray($request)
    {
        $this->loadMissing([
            'abilities.ability.skills',
        ]);

        return [
            'id'   => $this->id,
            'name' => $this->name,
            'speed' => $this->speed,

            'abilities' => CharacterAbilityResource::collection($this->abilities),
            'skills'    => CharacterSkillResource::collection($this->skills),

            'size'      => SizeResource::make($this->size),
            'race'      => RaceResource::make($this->race),
            'alignment' => AlignmentResource::make($this->alignment),
            'senses'    => SenseResource::collection($this->senses),

//            'parent' => $this->parent->id,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
