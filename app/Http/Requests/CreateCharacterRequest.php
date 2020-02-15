<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCharacterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => 'required|string',
            'size'      => 'required|string|exists:sizes,code',
            'race'      => 'required|string|exists:races,code',
            'alignment' => 'required|string|exists:alignments,code',

            'hp_dice'   => 'required|integer|exists:dice,sides',

            'abilities.speed'        => 'required|integer|min:0',
            'abilities.strength'     => 'required|integer|min:0',
            'abilities.dexterity'    => 'required|integer|min:0',
            'abilities.constitution' => 'required|integer|min:0',
            'abilities.intelligence' => 'required|integer|min:0',
            'abilities.wisdom'       => 'required|integer|min:0',
            'abilities.charisma'     => 'required|integer|min:0',
        ];
    }
}
