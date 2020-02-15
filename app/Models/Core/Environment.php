<?php

namespace App\Models\Core;

use App\Traits\ModelFindByTrait;
use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    use ModelFindByTrait;

    protected $table = 'environments';

    public $timestamps = false;
}
