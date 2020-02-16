<?php

namespace App\Http\Resources;

use App\Models\Core\Skill;
use Illuminate\Http\Resources\Json\JsonResource;

class CharacterSkillResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name'  => $this->name,
            'code'  => $this->code,
            'bonus' => $this->bonus,
            'ability' => $this->skill->ability->code,
        ];
    }
}
