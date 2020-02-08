<?php

namespace App\Models\Monster;

use App\Traits\EnsureModelTrait;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use EnsureModelTrait;

    protected $table = 'challenges';
}
