<?php

namespace App\Models\Core;

use App\Traits\ModelFindByTrait;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use ModelFindByTrait;

    protected $table = 'skills';

    public $timestamps = false;

    public function ability()
    {
        return $this->belongsTo(Ability::class);
    }
}
