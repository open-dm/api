<?php

namespace App\Models\Core;

use App\Traits\ModelFindByTrait;
use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    use ModelFindByTrait;

    protected $table = 'abilities';

    public $timestamps = false;

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
