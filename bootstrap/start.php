<?php

/*
| -------------------------------------------------------------
| Check PHP Version
| -------------------------------------------------------------
| Check minimum version requirement of Cygnite
| and trigger exception is not satisfied
|
*/
if (version_compare(PHP_VERSION, '5.4', '<') === true) {
    die('Cygnite Framework Requires PHP v5.4 or Above! \n');
}

/*
|--------------------------------------------------------------------------
| Check Extensions
|--------------------------------------------------------------------------
|
| Cygnite requires a few extensions to function. We will check if
| extensions loaded. If not we'll just exit from here.
|
*/
if ( ! extension_loaded('mcrypt')) {
    die('Cygnite requires Mcrypt PHP extension.'.PHP_EOL);
}

require 'initialize'.EXT;

/*
   |--------------------------------------------------------------------------
   | Run Application
   |--------------------------------------------------------------------------
   |
   | Booting Completed! Lets start the application
   */
return $app->run();/*
exit;

try {

    if (ENV == 'development') {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
    } else {
        ini_set('display_error', 0);
        error_reporting(0);
    }

} catch (\Exception $e) {

    $app['debugger']->handleException($app);

    if (ENV == 'development') {
        throw $e;
    }

    if ($app['debugger']->isLoggerEnabled() == true) {
        $app['debugger']->log($e);
    }

    $app['debugger']->renderErrorPage($e);
}*/