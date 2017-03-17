<?php
use Apps\Models\User;
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

$router->get('/module/{:id}', function ($router, $id) {
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
//$routeCollection = $app->getContainer()->make(\Apps\Routing\RouteCollection::class);
//$routeCollection->setRouter($router)->run();

$router->get('/user/{:name}/{:id}', function ($router, $name, $group_id) {
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
//$router->resource('resource', 'user'); // respond to resource routing

$router->set404Page(function () use($app) {
    $app->abort(404, "Abort 404 Page Not Found!");
});

$router->run();
