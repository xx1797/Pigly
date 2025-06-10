<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InitialWeightRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'current_weight' => ['required', 'numeric', 'regex:/^\d{1,3}(\.\d)?$/'],
            'target_weight'  => ['required', 'numeric', 'regex:/^\d{1,3}(\.\d)?$/'],
        ];
    }

    public function messages()
    {
        return [
            'current_weight.required' => '現在の体重を入力してください',
            'current_weight.numeric' => '数字で入力してください',
            'current_weight.regex' => '4桁までの数字で入力してください（小数点は1桁）',

            'target_weight.required' => '目標の体重を入力してください',
            'target_weight.numeric' => '数字で入力してください',
            'target_weight.regex' => '4桁までの数字で入力してください（小数点は1桁）',
        ];
    }
}
