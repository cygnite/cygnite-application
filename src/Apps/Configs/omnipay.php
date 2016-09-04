<?php
if (!defined('CF_SYSTEM')) {
    exit('External script access not allowed');
}

return [
    /** The default gateway name PayPal_Express, Stripe etc.*/
    'default' => 'PayPal_Express',

    /** Gateway specific parameters */
    'gateways' => [
        //https://github.com/thephpleague/omnipay#credit-card--payment-form-input
        'PayPal_Express' => [
            'username' => 'adrian',
            'password' => '12345',
            'signature' => '',
            'landingPage' => ['billing', 'login'],
            //'borderColor' => '#000000',
            'testMode' => false
        ],
        /*'Stripe' => [
            'username' => 'adrian',
            'password' => '12345',
            'apiKey' => 'abc123',
            'signature' => '',
            'landingPage' => ['billing', 'login'],
            'testMode' => false
        ],*/
    ],
];
