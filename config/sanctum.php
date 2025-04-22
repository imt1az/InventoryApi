<?php

use Laravel\Sanctum\Sanctum;

return [

    'stateful' => array_filter(array_unique(array_merge(
        explode(',', env('SANCTUM_STATEFUL_DOMAINS', '')),
        [
            'localhost',
            'localhost:3000',
            '127.0.0.1',
            '127.0.0.1:8000',
            '::1',
            parse_url(env('APP_URL'), PHP_URL_HOST),
            Sanctum::currentApplicationUrlWithPort()
        ]
    ))),

    'guard' => ['web'],

    'expiration' => null,

    'token_prefix' => env('SANCTUM_TOKEN_PREFIX', ''),

    'middleware' => [
        'authenticate_session' => Laravel\Sanctum\Http\Middleware\AuthenticateSession::class,
        'encrypt_cookies' => Illuminate\Cookie\Middleware\EncryptCookies::class,
        'validate_csrf_token' => Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
    ],

];