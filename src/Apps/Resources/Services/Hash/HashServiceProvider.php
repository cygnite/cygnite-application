<?php
namespace Apps\Resources\Services\Hash;

use Cygnite\Hash\BCrypt;
use Cygnite\Foundation\Application;
use Cygnite\DependencyInjection\ServiceProvider;

class HashServiceProvider extends ServiceProvider
{
    protected $app;

    /**
     * Register the HASH Service Provider.
     *
     * @param Application $app
     */
    public function register(Application $app)
	{
        $app['hash'] = $app->share (function($c)
        {
            return new BCrypt();
        });
	}
}
