<?php

namespace App\Models\Core;

use App\Traits\ModelFindByTrait;
use Illuminate\Database\Eloquent\Model;

class Dice extends Model
{
    use ModelFindByTrait;

    protected $table = 'dice';

    public $timestamps = false;

    public function roll(int $times = 1) {
        $result = 0;

        for ($i = 0; $i < $times; $i++) {
            $result += random_int(1, $this->sides);
        }

        return $result;
    }

    public function average(int $times = 1) {
        return (int) floor((($this->sides + 1) / 2) * $times);
    }

    public function max(int $times = 1) {
        return $this->sides * $times;
    }
}
