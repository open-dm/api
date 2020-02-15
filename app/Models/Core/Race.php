<?php

namespace App\Models\Core;

use App\Traits\ModelFindByTrait;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use ModelFindByTrait;

    protected $table = 'races';

    public $timestamps = false;
}
