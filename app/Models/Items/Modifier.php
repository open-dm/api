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

    /**
     * Gets the modifier bonus
     * 
     * @param array|object $data When value isn't static get from data
     * 
     * @return int
     */
    public function get_bonus($data)
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

    /**
     * Applies the modifier bonus to an existing value
     * 
     * @param int          $value The existing value that needs the bonus applied
     * @param array|object $data  When value isn't static get from data
     * 
     * @return int
     */
    public function apply_bonus(int $value, $data)
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
