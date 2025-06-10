<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array<mixed>|string>
     */
    protected function passwordRules(): array
    {
        return [
            'required',
            'string',
            'min:8',
            'regex:/[a-z]/',     // 小文字
            'regex:/[A-Z]/',     // 大文字
            'regex:/[0-9]/',     // 数字
            'confirmed',
        ];
    }
}
