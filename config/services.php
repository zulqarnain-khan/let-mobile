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
    'google' => [
        'client_id' => '632727589837-lcb45ee0po75mnrg7831iaf5qov757dg.apps.googleusercontent.com',
        'client_secret' => '1JUid6hEO_XOHHi_VX2Sg_Qi',
        'redirect' => 'https://letmobile.pk/auth/google/callback',
    ],
    'facebook' => [
     'client_id' => '2361466850840523',
     'client_secret' => 'a4d3f473c90ae3dd4370775900b83d97',
     'redirect' => 'https://letmobile.pk/auth/facebook/callback',
    ],

];
