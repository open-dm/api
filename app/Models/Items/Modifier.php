<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;

class Modifier extends Model
{
    protected $table = 'modifiers';

    public function parent()
    {
        return $this->morphTo('object');
    }

    public function get_bonus(array $data)
    {
        $raw_bonus = $this->attributes['bonus'];

        if (is_numeric($raw_bonus)) {
            return (int) $raw_bonus ?? 0;
        }

        if (is_string($raw_bonus)) {
            return data_get(
                $data,
                $raw_bonus,
                0
            );
        }
        
        return 0;
    }

    public function apply_bonus(int $value, array $data)
    {
        return max(
            $this->min ?? 0,
            min(
                $this->max ?? INF,
                $value + $this->get_bonus($data)
            )
        );
    }
}
