<?php

use Illuminate\Support\Env;

return [
    'allowed_methods' => ['*'],
    'allowed_origins' => [
        Env::get('APP_URL'),
        Env::get('FRONTEND_HOST'),
    ],
    'allowed_headers' => [
        'Authorization',
        'Content-Type',
        'Origin',
        'Accept',
    ],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
