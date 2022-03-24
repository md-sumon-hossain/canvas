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


    'facebook' => [
        'client_id' =>'639667180460427' ,
        'client_secret' => '82a033a9d4c0fa917e4bb16f5a34cd72',
        'redirect' => 'https://127.0.0.1:8000/auth/facebook/callback',
    ],

    'linkedin' => [
        'client_id' => '',
        'client_secret' => '',
        'redirect' => 'http://localhost:8000/auth/linkedin/callback'
    ],
    'google' => [
        'client_id' => '564058850501-h4ereoun0t8bitqa5ulgfqd5eqi1ltdo.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
      ], 
    
];