<?php

namespace App\Models\Language;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';

    public $timestamps = false;

    public function script()
    {
        return $this->belongsTo(
            LanguageScript::class
        );
    }
}
