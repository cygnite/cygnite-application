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

require 'initialize'.EXT;

/*
|--------------------------------------------------------------------------
| Set Application Default Timezone
|--------------------------------------------------------------------------
|
| We will set default timezone here for PHP. This will be used throughout
| the application for any date time functions.
|
*/
$config = \Cygnite\Helpers\Config::get('global.config');

date_default_timezone_set($config['timezone']);
/*
 | Set Environment for Application
 | Example:
 | <code>
 | define('ENV', 'development');
 | define('ENV', 'production');
 | </code>
 */
define('ENV', $config['environment']);

if (ENV == 'development') {
    ini_set('display_errors', -1);
    error_reporting(E_ALL);
} else {
    ini_set('display_error', 0);
    error_reporting(0);
}

// Register debugger into the application
$app->singleton('debugger', function () {
    return new \Apps\Exceptions\Handler();
});

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| We will handle the incoming request using Kernel and send response
| back to the browser. Http middlewares will get executed during the request
| handling process.
*/
$kernel = $app->createKernel('\Apps\Kernel');

$response = $kernel->handle(
    $request = \Cygnite\Http\Requests\Request::createFromGlobals()
);

$response->send();

/*
 | The response sent to the browser. Let us fire middleware's
 | shutdown method before shutting down the application
 |
 */
$kernel->shutdown($request, $response);
