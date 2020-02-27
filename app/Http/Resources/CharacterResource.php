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
            'id'             => $this->id,
            'name'           => $this->name,
            'speed'          => $this->speed,
            'armor_class'    => $this->armor_class,
            'hit_points'     => $this->hit_points,
            'hit_points_avg' => $this->average_hit_points,

            'hit_point_base'       => $this->base_hit_points,
            'hit_point_dice'       => $this->hit_point_dice->sides,
            'hit_point_dice_count' => $this->hit_point_dice_count,

            'abilities' => CharacterAbilityResource::collection($this->abilities),
            'skills'    => CharacterSkillResource::collection($this->skills),

            'size'         => SizeResource::make($this->size),
            'race'         => RaceResource::make($this->race),
            'alignment'    => AlignmentResource::make($this->alignment),
            'senses'       => SenseResource::collection($this->senses),
            'environments' => EnvironmentResource::collection($this->environments),

            'items' => ItemResource::collection($this->items),
            'actions' => ActionResource::collection($this->all_actions),

//            'parent' => $this->parent->id,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'template' => !!$this->is_template,
        ];
    }
}
