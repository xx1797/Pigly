<?php

use Laravel\Fortify\Features;

return [

    'guard' => 'web',

    'passwords' => 'users',

    'username' => 'email',

    'email' => 'email',

    'views' => true, // Blade を使うときは true

    'home' => '/weight_logs', // ログイン後のリダイレクト先

    'middleware' => ['web'],

    'authenticatable' => Laravel\Fortify\Http\Middleware\EnsureLoginIsNotThrottled::class,

    'limiters' => [
        'login' => 'login',
        'two-factor' => 'two-factor',
    ],

    'features' => [
        Features::registration(),
        Features::resetPasswords(),
        Features::emailVerification(),
        Features::updateProfileInformation(),
        Features::updatePasswords(),
        Features::twoFactorAuthentication([
            'confirmPassword' => true,
        ]),
    ],
];
