<?php
use Cygnite\Application;
use Cygnite\Base\Router;

if (!defined('CF_SYSTEM')) {
    exit('No External script access allowed');
}
/**
*  Cygnite Framework
*
*  An open source application development framework for PHP 5.3 or newer
*
*   License
*
*   This source file is subject to the MIT license that is bundled
*   with this package in the file LICENSE.txt.
*   http://www.cygniteframework.com/license.txt
*   If you did not receive a copy of the license and are unable to
*   obtain it through the world-wide-web, please send an email
*   to sanjoy@hotmail.com so I can send you a copy immediately.
*
* @Package            :  Apps
* @Sub Packages       :
* @Filename           :  routes
* @Description        :  This file is used to set all routing configurations
* @Author             :  Cygnite dev team
* @Copyright          :  Copyright (c) 2013 - 2014,
* @Link	              :  http://www.cygniteframework.com
* @Since	          :  Version 1.0
* @FileSource
* @todo               :  Multiple routing configurations have to implemented and have to simplify
*                        core code for routing feature, have to add more filter validation.
*
*/
$router = new Router;

// Before Router Middle Ware
$router->before(
    'GET',
    '/.*',
    function () {
        //echo "The Framework is under active development";
    }
);

// Dynamic route: /hello/name/(\d+)
$router->get(
    '/hello/(\w+)',
    function ($name) {
        Router::call('Home.testing', array($name,'Cygnite PHP Framework'));
        Router::end();
    }
);


$router->post(
    '/categories/post/',
    function () {
        $client_data = file_get_contents("php://input");
        $client_data = json_decode($client_data);
        show($client_data->USER_ID);
        Router::end();
    }
);

$router->get(
    '/categories/emplist/',
    function () {
        echo "Category List";
        Router::end();
    }
);

$router->run();
