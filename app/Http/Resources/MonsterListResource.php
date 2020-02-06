<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MonsterListResource extends JsonResource
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
            'size' => [
                'id' => $this->size->id,
                'size' => $this->size->name
            ],
            'challenge' => [
                'id' => $this->challenge->id,
                'level' => $this->challenge->level,
                'xp' => $this->challenge->xp
            ],
            'alignment' => [
                'id' => $this->alignment->id,
                'name' => $this->alignment->name
            ],
        ];
    }
}
