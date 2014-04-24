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
    die(
        'Sorry Cygnite Framework will
        run on PHP version  5.3 or greater! \n'
    );
}

if (!extension_loaded('mcrypt')) {
	die("Cygnite Framework require mcrypt extension to run.");
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

global $event;

//create Event handler to attach all events
$event = new Cygnite\Base\Event();

$event->attach("exception", '\\Cygnite\\Exception\\Handler@handleException');

$config = array();
//Get the configuration variables.
$config = array(
    'app' => Config::load(),
    'event' => $event
);
//unset($config);
//Load application and Get application instance to boot up
$application = Application::instance(
    function($app) use($config) {

        /**
        *---------------------------------------------------
        * Set Configurations and Events for boot-up process
        * --------------------------------------------------
        */
        return $app->setConfiguration($config)
                   ->boot();
    }
);
//Response to browser
$application->run();

if (Config::get('global_config', 'enable_profiling') == true) {
   Profiler::end();
}
