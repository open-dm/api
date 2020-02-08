<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
