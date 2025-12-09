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

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Google AdSense Configuration
    |--------------------------------------------------------------------------
    |
    | Configure your Google AdSense settings here. After getting approved,
    | update your .env file with ADSENSE_ENABLED=true
    |
    */
    'adsense' => [
        'enabled' => env('ADSENSE_ENABLED', false),
        'client_id' => env('ADSENSE_CLIENT_ID', 'ca-pub-6179890788485964'),
        'slots' => [
            'auto' => '', // Leave empty for auto ads
        ],
    ],

];
