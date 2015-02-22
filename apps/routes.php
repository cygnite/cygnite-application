<?php
if (!defined('CF_SYSTEM')) {
    exit('No External script access allowed');
}

use Cygnite\Foundation\Application as App;

$app = App::instance();

// Before Router Middle Ware
$app->router->before(
    'GET',
    '/{:all}',
    function () {
        //echo "This site is under maintenance.";
    }
);

// Dynamic route: /hello/cygnite/3222
$app->router->get(
    '/hello/{:name}/{:digit}',
    function ($router, $name, $id) {
        //Router::call('Home.welcome', array($name, $id));
    }
);

$app->router->get(
    '/category/{:name}/product.json',
    function ($router, $name) {	// inject first parameter as router instance
        //show($router);
        echo "webservice json url request routing $name";
    }
);

/**
 * Json Request Format {"USER_ID": "32"}
 * type : POST
*/
$app->router->post(
    '/categories/post/',
    function () {
        $data = file_get_contents("php://input");
        $data = json_decode($data);
        show($data->USER_ID);
    }
);

/*
GET       - resource/           user.index
GET       - resource/new        user.new
POST      - resource/           user.create
GET       - resource/{id}       user.show
GET       - resource/{id}/edit  user.edit
PUT|PATCH - resource/{id}       user.update
DELETE    - resource/{id}       user.delete
*/
//$app->router->resource('resource', 'user'); // respond to resource routing

/**
 * After routing callback
 * Will call after executing all user defined routing.
 */
$app->router->run(function()
{

});
