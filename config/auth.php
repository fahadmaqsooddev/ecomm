<?php
return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
        //'session' => env('SESSION_COOKIE', 'laravel_session'),
    ],
    'admin' => [
        'driver' => 'session',
        'provider' => 'admins',
        //'session' => env('ADMIN_SESSION_COOKIE', 'laravel_session_admin'),
    ],
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],
    'admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\Admin::class,
    ],
],

'passwords' => [
    'users' => [
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
    ],
    'admins' => [
        'provider' => 'admins',
        'table' => 'password_resets', // Or 'password_reset_tokens' if custom
        'expire' => 60,
        'throttle' => 60,
    ],
],

'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
