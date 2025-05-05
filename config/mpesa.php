<?php

return [
    'environment' => env('MPESA_ENV', 'sandbox'), // 'sandbox' or 'production'

    'sandbox' => [
        'shortcode'       => env('MPESA_SANDBOX_SHORTCODE', ''),
        'consumer_key'    => env('MPESA_SANDBOX_CONSUMER_KEY', ''),
        'consumer_secret' => env('MPESA_SANDBOX_CONSUMER_SECRET', ''),
        'passkey'         => env('MPESA_SANDBOX_PASSKEY', ''),
    ],

    'production' => [
        'shortcode'       => env('MPESA_PROD_SHORTCODE', ''),
        'consumer_key'    => env('MPESA_PROD_CONSUMER_KEY', ''),
        'consumer_secret' => env('MPESA_PROD_CONSUMER_SECRET', ''),
        'passkey'         => env('MPESA_PROD_PASSKEY', ''),
    ],

    'callback_url'      => env('MPESA_CALLBACK_URL', ''), // URL Safaricom will call with payment result
    'account_reference' => env('MPESA_ACCOUNT_REF', 'MyBusiness'), // Identifier for your business or transaction
    'transaction_desc'  => env('MPESA_TRANSACTION_DESC', 'Payment for order'),
];
