<?php

use Cygnite\Strapper;
use Cygnite\Application;
use Cygnite\Base\Event;
use Cygnite\Helpers\Config;
use Cygnite\Helpers\Profiler;

/**
* ------------------------------------------------------
* Define the Cygnite Framework  Version
* ------------------------------------------------------
*/
defined('CF_VERSION') or define('CF_VERSION', '(v1.0.8 beta)');

/*
* -------------------------------------------------------------
* Check minimum version requirement of Cygnite
* and trigger exception is not satisfied
* -------------------------------------------------------------
*/
if (version_compare(PHP_VERSION, '5.3', '<') === true) {
    @set_magic_quotes_runtime(0); // Kill magic quotes
    throw new \ErrorException(
        'Sorry Cygnite Framework will
        run on PHP version  5.3 or greater! \n'
    );
}

require __DIR__ . "/../vendor/autoload.php";

function show($resultArray = array(), $hasExit = "")
{
    echo '<pre>';
    print_r($resultArray);
    echo '</pre>';
    if ($hasExit === 'exit') {
        exit;
    }
}

global $events;

//create Event handler to attach all events
$events = new Cygnite\Base\Event();

$events->attach("exception", '\\Cygnite\\onExceptions');

$config = array();
//Get the configuration variables.
$config = Config::load();

$app = array(
    'config' => $config,
    'event' => $events
);
unset($config);
//Load application and Get application instance to boot up
$response = Application::load(
    function($instance) use($app){

        $response = null;
        /**
         *---------------------------------------------------
         * Set Configurations and Events for boot-up process
         * --------------------------------------------------
         */
        $response = $instance->setConfig($app['config'])
                             ->setEventInstance($app['event'])
                             ->initialize(new Strapper)
                             ->send(new Cygnite\Base\Router);

        return $response;
    }
);

//Return Response to browser
$response->run();

if (Config::getConfig('global_config', 'enable_profiling') == true) {
   Profiler::end();
}