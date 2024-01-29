<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '888578186271007',
        'client_secret' => '7d94377ae2d644f4543539457db077d6',
        'redirect' => '/auth/facebook/callback',
    ],
    'google' => [
        'client_id' => '746053611704-cf15b8t6vk477oqnjti6bbb037o64g3l.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => '/auth/google/callback',
    ],
];
