<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// TODO - Some thought needs to go into how this is going to work for diff models.

class ApiCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'      => 'required|string',
            'size'      => 'required|string',
            'alignment' => 'required|string',
            'challenge' => 'required'
        ];
    }
}
