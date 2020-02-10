<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WeaponResource extends JsonResource
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
            'weapon_actions' => ActionResource::collection($this->actions)
        ];
    }
}
