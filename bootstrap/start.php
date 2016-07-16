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
|--------------------------------------------------------------------------
| Run Application
|--------------------------------------------------------------------------
|
| Booting Completed! Lets start the application
*/
$app->singleton('debugger', function () {
    return new \Apps\Exceptions\Handler();
});

$kernel = $app->createKernel('\Apps\Kernel');

$response = $kernel->handle(
    $request = \Cygnite\Http\Requests\Request::createFromGlobals()
);

$response->send();
//$kernel->terminate($request, $response);
