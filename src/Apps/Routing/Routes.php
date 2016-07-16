<?php
use Apps\Models\User;
use Cygnite\Base\Router\Router;
use Cygnite\Foundation\Application;
use Cygnite\Http\Responses\Response;

if (!defined('CF_SYSTEM')) {
    exit('No External script access allowed');
}

/*
 | Set Locale For The Application
 | $app->setLocale();
 */

/*
 | Language Translation
 |
 |  show(trans('message:custom.welcome'));
 |  show(trans('message:accepted', ['{attribute}' => 'accepted']));
 |  show(trans('Hello Translator {user}', ['{user}' => 'Cygnite']));
 */

$app->router->get('/module/{:id}', function ($router, $id) {
    //Router::call("Acme::User@Index", []);
    /*
     | Call module directly from routing
     */
    $content = $router->callController(["Acme::User@index", [$id]]);
    return Response::make($content);
});


/*
 | Separate all static and group routing from this file
 | also allow you to extend the CRUD static routes
 |
 | For every CRUD Controller you need to define routes
 | in RouteCollection, see
 | 
 | RouteCollection::executeStaticRoutes(); function
 |
 | Uncomment below snippet to use RouteCollection
 */
//$routeCollection = $app->make('\Apps\Routing\RouteCollection');
//$routeCollection->setRouter($app->router)->run();

$app->router->get('/user/{:name}/{:id}', function ($router, $name, $group_id) {
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

$app->router->set404Page(function () use($app) {
    $app->abort(404, "Abort 404 Page Not Found!");
});

$app->router->run();
