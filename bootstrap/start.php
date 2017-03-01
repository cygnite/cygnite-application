<?php
declare(strict_types=1);
use Cygnite\Helpers\Config;
use Cygnite\Http\Requests\Request;
use Cygnite\Foundation\Application;
use Cygnite\Bootstrappers\Bootstrapper;
use Cygnite\Bootstrappers\BootstrapperDispatcher;

$paths = require __DIR__.'/paths.php';
Config::init($paths['app.config'], require $paths['app.config'].DS.'files.php');

/*
| -------------------------------------------------------------
| Check PHP Version
| -------------------------------------------------------------
| Check minimum version requirement of Cygnite
| and trigger exception is not satisfied
|
*/
if (version_compare(PHP_VERSION, '7.0.0') < 0) {
    die('Cygnite Framework Requires PHP v7.0.0 or Above!');
}

$container = new \Cygnite\Container\Container(
    new \Cygnite\Container\Injector(),
    include $paths['app.config'].DS.'definitions'.DS.'configuration.php',
    $paths['app.namespace'].'\\Controllers\\'
);
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
    ini_set('display_errors', '-1');
    error_reporting(E_ALL);
} else {
    ini_set('display_error', '0');
    error_reporting(0);
}

// Register debugger into the application
$container->singleton('debugger', function () use($paths) {
    return new \Apps\Exceptions\Handler($paths);
});

$container['debugger']->setEnv(ENV)->handleException();
$bootstrapper = new Bootstrapper(new \Cygnite\Bootstrappers\Paths($paths));
$bootstrapper->registerBootstrappers(require $paths['app.config'].DS.'bootstrappers.php');

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| To boot framework first thing we will create a new application instance
| which serves glue for all the components, and binding components
| with the IoC container
*/
$app = new Application($container, new BootstrapperDispatcher($container, $bootstrapper));

if (isCli()) {
    return true;
}

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
