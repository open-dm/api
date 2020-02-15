<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'limit' => 'integer|min:1|max:100',
            'offset' => 'integer',
            'search' => 'string',
            'filters' => 'array'
        ];
    }
}
