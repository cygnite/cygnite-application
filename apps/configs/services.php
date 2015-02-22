<?php
use Cygnite\Foundation\Application as App;

if (!defined('CF_SYSTEM')) {
    exit('External script access not allowed');
}

// Register all service provider
App::service(function ($app)
{
    
    /*$app->registerServiceProvider(
        array(
            "Application\\Services\\Payment\\ApiService",
        )
    );
	
    // Use Controller as Service 
    $app['user.controller'] = function () use($app)
    {
        return new \Application\Controllers\HelloController(new \Cygnite\Mvc\Controller\ServiceController, $app);
    }; 
	// OR 
	// Controller as Service
    $app->setServiceController('hello.controller', '\Application\Controllers\HelloController');*/
});
