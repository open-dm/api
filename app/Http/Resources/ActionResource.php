<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActionResource extends JsonResource
{
    public function toArray($request)
    {
        $result = [
            'name'        => $this->name,
            'description' => $this->description,
            'type'        => $this->type,
            'bonus'       => $this->bonus,
            'hit_bonus'   => $this->hit_bonus,
            'dice'        => null,
        ];

        if ($this->dice) {
            $result['dice'] = [
                'sides' => $this->dice->sides,
                'count' => $this->dice_count,
            ];
        }

        return $result;
    }
}
