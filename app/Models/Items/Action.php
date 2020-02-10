<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;
use App\Models\Core\Dice;

class Action extends Model
{
    protected $table = 'actions';

    public function parent()
    {
        return $this->morphTo('object');
    }

    public function dice()
    {
        return $this->belongsTo(Dice::class);
    }

    public function dice_as_string()
    {
        return "{$this->dice_count}d{$this->dice->sides}";
    }
}
