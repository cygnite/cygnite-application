<?php
namespace Apps\Routing;

use Cygnite\Proxy\StaticResolver;
use Cygnite\Foundation\Application;
use Cygnite\Base\Router\Controller\Controller;

/**
 * Class RouteCollection
 *
 * This class used to register all static and group
 * routes into Cygnite Router. User can separate Closure
 * and other routing patterns from the Routes.php file.
 *
 *
 * @package Apps\Routing
 */
class RouteCollection extends StaticResolver
{
    public $router;

    /**
     * @param Router $router
     * @return $this
     */
    protected function setRouter($router)
    {
        $this->router = $router;

        return $this;
    }

    /**
     * By default controller will respond to
     * various routes as index, add, edit, show, delete.
     * You can also add additional actions to the routes.
     *
     * @return $this
     */
    protected function executeStaticRoutes()
    {
        /*
         | You can add additional actions to routes
         | If you are adding extra patterns make sure you
         | add the method (PascalCase) into RouteController. The method
         | name should be same as patterns defined here, example
         |
         | <code>
         |   pattern: order-info
         |   method:
         |   protected function setUserInfoRoute($controller, $action)
         |   {
         |       $controllerName = Inflector::classify($controller);
         |       $actionName = Inflector::classify($action);
         |
         |       //$this->mapRoute("pattern", "controller.action");
         |       return $this->mapRoute("/$controller/$action/", $controllerName.'.'.$actionName);
         |   }
         | </code>
         */
        (new StaticRoutesController)
            ->setAction(['order-info'])
            ->controller('Product');// Add multiple CRUD controllers to respond to static routes

        return $this;
    }

    /**
     * We will set all group routes in this method
     *
     * @return $this
     */
    protected function executeGroupRoutes()
    {
        /*
         | Set multiple group routes
         */
        $this->router->group('/movies', function($route) {

            $route->get('/', function ()
            {
                echo "Movies Overview";
            });

            $route->get('english/{:id}', function ($route, $id)
            {
                echo "Movie $id";
            });

            $route->where('{:id}', '(\d+)')->get('spanish/{:id}', function ($route, $id)
            {
                echo "Movie with custom where clause $id";
            });
        });

        return $this;
    }

    /**
     * We will run all static and group routes
     * registered in this class
     */
    public function run()
    {
        $this->executeStaticRoutes();
        $this->executeGroupRoutes();
    }
}