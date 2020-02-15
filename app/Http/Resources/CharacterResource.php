<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CharacterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,

            'abilities' => new CharacterAbilitiesResource($this),

            'size'      => new SizeResource($this->size),
            'race'      => new RaceResource($this->race),
            'alignment' => new AlignmentResource($this->alignment),

//            'parent' => $this->parent->id,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
