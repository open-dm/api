<?php

namespace App\Models\Items;

use App\Interfaces\Targetable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Core\Dice;

class Action extends Model
{
    protected $table = 'actions';

    public $guarded = ['id'];

    public $timestamps = false;

    public static function run(
        Targetable $target,
        Action $action
    ) {
        dd('Running action on', $target, $action);
    }

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
        if ($dice) {
            $this->dice()->associate(
                $dice instanceof Dice ?
                    $dice :
                    Dice::findByOrFail('sides', $dice)
            );
        }
    }

    public function getNameAttribute()
    {
        if ($this->attributes['name']) {
            return $this->attributes['name'];
        }

        return $this->parent->name;
    }
}
