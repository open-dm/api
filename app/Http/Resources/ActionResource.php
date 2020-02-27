<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
//            'dice' => $this->dice->sides,
//            'dice_count' => $this->dice_count,
        ];
    }
}
