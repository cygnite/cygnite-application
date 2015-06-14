<?php
use Apps\Models\User;
use Cygnite\Base\Router\Router;
use Cygnite\Foundation\Application;

if (!defined('CF_SYSTEM')) {
    exit('No External script access allowed');
}

$app = Application::instance();
$app->setLocale();

(new Apps\Middlewares\Events\Event())->register();
$app['event.api.run']();

//show(trans('validation.not_in'));
//show(trans('Hello Translator :user', [':user' => 'Cygnite']));

// Before Router Middle Ware
$app->router->before('GET', '/{:all}', function ()
{
   //echo "This site is under maintenance.";exit;
});


//$app->router->get('/hello/index/{:digit}', "User.getIndex");
$app->router->get('/hai/{:id}', function($router, $id) {
    //Router::call("User.getIndex", []);
    $router->callController(["User.getIndex", []]);
});

$app->router->get('/world/{:id}', "Home.world");
$app->router->get('/test/{:id}', "Home.test");


/*$app->router->get('/product/', "Product.index");
$app->router->get('/product/show/{:id}', "Product.show");
$app->router->get('/product/edit/{:id}', "Product.edit");
$app->router->get('/product/add/', "Product.add");*/

use Apps\Routing\RouteCollection;

// Separate all static and group routing from this file
RouteCollection::setRouter($app['router'])->run();

//$routeCollection = $app->make('\Apps\Routing\RouteCollection');
//$routeCollection->setRouter($app['router'])->run();



$app->router->get('/home/index/', function ($route)
{
    echo "Home Index";
});


$app->router->get('/user/{:name}/{:id}', function ($router, $name, $group_id)
{
    $user = new User();
    $user->name = (string) $name;
    $user->group_id = (int) $group_id;
    $user->save();
});

/*
// Dynamic route: /hello/cygnite/3222
$app->router->get('/hello/{:name}/{:digit}', function ($router, $name, $id)
{
   //Router::call('Home.welcome', array($name, $id));
});
*/

/*
GET       - resource/           user.getIndex
GET       - resource/new        user.getNew
POST      - resource/           user.postCreate
GET       - resource/{id}       user.getShow
GET       - resource/{id}/edit  user.getEdit
PUT|PATCH - resource/{id}       user.putUpdate
DELETE    - resource/{id}       user.delete
*/
//$app->router->resource('resource', 'user'); // respond to resource routing

$app->router->set404Page(function()
{
    throw new \Cygnite\Exception\Http\HttpException(403, "Abort 404 Page Not Found!");
    //throw new \Cygnite\Exception\Http\HttpNotFoundException("Abort 404 Page!", new \Cygnite\Exception\Http\HttpNotFoundException, 404);
    //throw new \Cygnite\Exception\Http\HttpException(404, "Http Exception");
    //throw new \Cygnite\Exception\Http\HttpException(500, "Http Exception", new \Cygnite\Exception\Http\HttpNotFoundException);
});

/**
 * After routing callback
 * Will call after executing all user defined routing.
 */
$app->router->after(function()
{
   //echo "After Routing callback";
});


$app->router->run();
