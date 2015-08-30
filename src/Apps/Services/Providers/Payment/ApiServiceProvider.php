<?php
namespace Apps\Services\Providers\Payment;

use Cygnite\Container\Service\ServiceProvider;
use Cygnite\Foundation\Application;

class ApiServiceProvider extends ServiceProvider
{
    protected $app;
    
    public function register(Application $app)
    {
        $app['payment.api'] = $app->share(function ($c) {
            //return new PayPal();
        });
    }
}
