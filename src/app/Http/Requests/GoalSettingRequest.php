<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoalSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'target_weight' => ['required', 'numeric', 'regex:/^\d{1,3}(\.\d)?$/'],
        ];
    }

    public function messages()
    {
        return [
            'target_weight.required' => '目標の体重を入力してください',
            'target_weight.numeric' => '数字で入力してください',
            'target_weight.regex' => '4桁までの数字で入力してください（小数点は1桁）',
        ];
    }
}
