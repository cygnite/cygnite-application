<?php
/*
 |-------------------------------------------------------------------
 | Register Composer PSR Auto Loader
 |-------------------------------------------------------------------
 |
 | Composer is the convenient way to auto load all dependencies and
 | classes. We will simple require it here, so that we don't need
 | worry about importing classes manually.
 */
require __DIR__ . "/../vendor/autoload.php";

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| To boot framework first thing we will create a new application instance
| which serves glue for all the components, and binding components
| with the IoC container
*/
$app = new \Cygnite\Foundation\Application();
/**
 | ---------------------------------------------------
 | Application booting process
 | --------------------------------------------------
 *
 * Set configuration and services and boot-up application
 */
return $app->configure();
