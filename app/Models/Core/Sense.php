<?php

namespace App;

use App\Traits\ModelFindByTrait;
use Illuminate\Database\Eloquent\Model;

class Sense extends Model
{
    use ModelFindByTrait;

    protected $table = 'senses';

    public $timestamps = false;
}
