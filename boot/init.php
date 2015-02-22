<?php
use Cygnite\Helpers\Config;
use Cygnite\Foundation\Application as App;
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

require __DIR__ . "/../vendor/autoload.php";

if (!extension_loaded('mcrypt')) {
    trigger_error("Cygnite require mcrypt extension to use encryption mechanism.");
}

function show($resultArray = array(), $hasExit = false)
{
    echo '<pre>';
    print_r($resultArray);
    echo '</pre>';
    if ($hasExit) {
        exit;
    }
}

/**-------------------------------------------------------------------
 * Check if it is running via cli and return false
 * -------------------------------------------------------------------
 */
$filename = preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);

if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

//Get application instance to boot up
$app = App::instance();

//Attach event handler
$app['app.event'] = function () use($app) {
    $event = $app->singleton('\Cygnite\Base\Event');
$event->attach("exception", '\\Cygnite\\Exception\\Handler@handleException');
    return $event;
};
        /**
        *---------------------------------------------------
 * Set configuration, boot-up application and
 * send response to browser
        * --------------------------------------------------
        */
return $app->setConfiguration(
    array(
        'app' => Config::load()
    ))->setServices()->boot()->run();
