<?php
namespace Apps\Modules\Acme;

use Cygnite\Helpers\Config;
use Cygnite\Foundation\Application;

if (!defined('CF_SYSTEM')) {
    exit('External script access not allowed');
}

class BootStrap
{
    /**
     * You can register events or data into container
     * before responding to the module controller
     *
     * @param $app
     * @param $path
     */
    public function register($app, $path)
    {

    }
}