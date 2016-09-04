<?php
if (!defined('CF_SYSTEM')) {
    exit('External script access not allowed');
}

/**
 * Register all service providers
 *
 * Add multiple Service Provider into the array
 * 
 */
 /*
 $app->registerServiceProvider([
        "Apps\Services\Providers\Payment\ApiServiceProvider",
        "Cygnite\Services\Stripe\Providers\StripeServiceProvider",
        "Cygnite\Services\Omnipay\Providers\OmnipayServiceProvider"
 ]);*/

// Controller as Service automatic configuration
/*
$app->setServiceController('hello.controller', '\Apps\Controllers\HelloController');
OR

// Use Controller as Service manual configuration
$app['user.controller'] = function () use($app)
{
    return new \Apps\Controllers\HelloController(new \Cygnite\Mvc\Controller\ServiceController, $app);
};
*/
