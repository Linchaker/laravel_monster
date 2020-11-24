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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'github' => [
        'client_id' => '048f3b2d79172a3a207d',
        'client_secret' => '7bf3e6a19bca0679f4e20e60476eb6108aae1b73',
        'redirect' => '/api/v2/auth/social/github/callback',
    ],

    'google' => [
        'client_id' => '',
        'client_secret' => '',
        'redirect' => '/social-auth/facebook/callback',
    ],

    'facebook' => [
        'client_id' => '',
        'client_secret' => '',
        'redirect' => '/social-auth/facebook/callback',
    ],

];
