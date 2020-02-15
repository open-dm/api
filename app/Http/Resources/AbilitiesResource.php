<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AbilitiesResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'speed'        => $this->speed,
            'strength'     => $this->strength,
            'dexterity'    => $this->dexterity,
            'constitution' => $this->constitution,
            'intelligence' => $this->intelligence,
            'wisdom'       => $this->wisdom,
            'charisma'     => $this->charisma,
        ];
    }
}
