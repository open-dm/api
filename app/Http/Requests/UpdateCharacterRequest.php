<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCharacterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => 'sometimes|string',
            'size'      => 'sometimes|string|exists:sizes,code',
            'race'      => 'sometimes|string|exists:races,code',
            'alignment' => 'sometimes|string|exists:alignments,code',

            'hp_dice'   => 'sometimes|integer|exists:dice,sides',

            'abilities.speed'        => 'sometimes|integer|min:0',
            'abilities.strength'     => 'sometimes|integer|min:0',
            'abilities.dexterity'    => 'sometimes|integer|min:0',
            'abilities.constitution' => 'sometimes|integer|min:0',
            'abilities.intelligence' => 'sometimes|integer|min:0',
            'abilities.wisdom'       => 'sometimes|integer|min:0',
            'abilities.charisma'     => 'sometimes|integer|min:0',
        ];
    }
}
