<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;
use App\Models\Core\Dice;

class Action extends Model
{
    protected $table = 'actions';

    public $timestamps = false;

    public function parent()
    {
        return $this->morphTo('object');
    }

    public function dice()
    {
        return $this->belongsTo(Dice::class);
    }

    public function setDiceAttribute($dice)
    {
        $this->dice()->associate(
            $dice instanceof Dice ?
                $dice :
                Dice::findByOrFail('sides', $dice)
        );
    }

    public function getNameAttribute()
    {
        if ($this->attributes['name']) {
            return $this->attributes['name'];
        }

        return $this->parent->name;
    }
}
