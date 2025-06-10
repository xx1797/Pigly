<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeightLogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'date'              => 'required|date',
            'weight'            => ['required', 'numeric', 'regex:/^\d{1,3}(\.\d)?$/'],
            'calories'          => 'required|integer',
            'exercise_time'     => 'required',
            'exercise_content'  => 'nullable|string|max:120',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'date.date' => '正しい日付を入力してください',

            'weight.required' => '体重を入力してください',
            'weight.numeric' => '数字で入力してください',
            'weight.regex' => '4桁までの数字で入力してください（小数点は1桁）',

            'calories.required' => '摂取カロリーを入力してください',
            'calories.integer' => '摂取カロリーは整数で入力してください',

            'exercise_time.required' => '運動時間を入力してください',

            'exercise_content.max' => '運動内容は120文字以内で入力してください',
        ];
    }
}
