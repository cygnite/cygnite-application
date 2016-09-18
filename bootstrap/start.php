<?php
use Cygnite\Helpers\Config;
use Cygnite\Foundation\Application;
use Cygnite\Bootstrappers\Bootstrapper;


$paths = require __DIR__.'/paths.php';
Config::init($paths['app.config'], require $paths['app.config'].DS.'files'.EXT);

/*
| -------------------------------------------------------------
| Check PHP Version
| -------------------------------------------------------------
| Check minimum version requirement of Cygnite
| and trigger exception is not satisfied
|
*/
if (version_compare(PHP_VERSION, '7.0', '<') === true) {
    die('Cygnite Framework Requires PHP v7.0 or Above! \n');
}

$container = new \Cygnite\Container\Container();
/*
|--------------------------------------------------------------------------
| Set Application Default Timezone
|--------------------------------------------------------------------------
|
| We will set default timezone here for PHP. This will be used throughout
| the application for any date time functions.
|
*/
$config = Config::get('global.config');

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
$container->singleton('debugger', function () {
    return new \Apps\Exceptions\Handler();
});

$container['debugger']->setEnv(ENV)->handleException();

$bootstrapper = new Bootstrapper(new \Cygnite\Bootstrappers\Paths($paths));
$bootstrapper->registerBootstrappers(require $paths['app.config'].DS.'bootstrappers'.EXT);

$bootstrapDispatcher = new \Cygnite\Bootstrappers\BootstrapperDispatcher($container, $bootstrapper);
/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| To boot framework first thing we will create a new application instance
| which serves glue for all the components, and binding components
| with the IoC container
*/
$app = new Application($container, $bootstrapDispatcher);
/**
| ---------------------------------------------------
| Application booting process
| --------------------------------------------------
 *
 * Set configuration and services and boot-up application
 */
//$app->configure();

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
