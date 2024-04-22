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
        'token' => env('POSTMARK_TOKEN'),
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

    'rapidapi' => [
        'rapid_api_key' => env('RAPID_API_KEY'),
        'languages' => [
            'rapid_api_url' => env('LANGUAGES_LIST_RAPID_API_URL'),
            'rapid_api_host' => env('LANGUAGES_LIST_RAPID_API_HOST'),
        ],
        'id_verification' => [
            'rapid_api_url' => env('ID_VERIFICATION_RAPID_API_URL'),
            'rapid_api_host' => env('ID_VERIFICATION_RAPID_HOST'),
        ],
    ],

];
