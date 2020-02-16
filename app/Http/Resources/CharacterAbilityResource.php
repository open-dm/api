<?php

namespace App\Http\Resources;

use App\Models\Core\Skill;
use Illuminate\Http\Resources\Json\JsonResource;

class CharacterAbilityResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name'     => $this->name,
            'code'     => $this->code,
            'score'    => $this->score,
            'modifier' => $this->modifier,
            'skills'   => $this->ability->skills->pluck('code'),
        ];
    }
}
