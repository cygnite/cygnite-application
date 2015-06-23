<?php
use Apps\Models\User;
use Cygnite\Base\Router\Router;
use Cygnite\Foundation\Application;

if (!defined('CF_SYSTEM')) {
    exit('No External script access allowed');
}

$app = Application::instance();

/*
 | Set Locale For The Application
 | $app->setLocale();
 */

/*
 | Language Translation
 |
 |  show(trans('validation.not_in'));
 |  show(trans('Hello Translator :user', [':user' => 'Cygnite']));
 */

// Before Router Middle Ware
$app->router->before('GET', '/{:all}', function ()
{
   //echo "This site is under maintenance.";exit(1);
});

$app->router->get('/module/{:id}', function($router, $id) {
    //Router::call("Acme::User@Index", []);
    /*
     | Call module directly from routing
     */
    return $router->callController(["Acme::User@index", [$id]]);
});


/*
 | Separate all static and group routing from this file
 | also allow you to extend the CRUD static routes
 |
 | For every CRUD Controller you need to define routes
 | for the controller into
 | RouteCollection::executeStaticRoutes(); function
 */
RouteCollection::setRouter($app['router'])->run();


$app->router->get('/user/{:name}/{:id}', function ($router, $name, $group_id)
{
    $user = new User();
    $user->name = (string) $name;
    $user->group_id = (int) $group_id;
    $user->save();
});
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
    throw new \Cygnite\Exception\Http\HttpException(404, "Abort 404 Page Not Found!");
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
