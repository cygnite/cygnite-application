<?php
namespace Apps\Routing;

use Cygnite\Helpers\Inflector;
use Cygnite\Base\Router\Controller\Controller;

/**
 * Class RouteController
 *
 * This class used to add additional static routing patterns
 * for the controller.
 *
 * @package Apps\Routing
 */
class StaticRoutesController extends Controller
{
    /**
     * Set additional actions to Routes, doing that
     * Router will be aware to respond to additional
     * requests
     *
     * @param array $actions
     * @return $this
     */
    public function setAction($actions = [])
    {
        $this->setActions($actions);

        return $this;
    }

    /**
     * Set controller name to respond controller routes
     *
     * @param $controller
     * @return $this
     */
    public function controller($controller)
    {
        $this->routeController($controller);

        return $this;
    }

    /**
     * Default routes actions: index, add, edit, show, delete
     * Additional routing to the controller: order-info -> orderInfoAction()
     *
     *
     * @param $controller
     * @param $action
     * @return mixed
     */
    protected function setOrderInfoRoute($controller, $action)
    {
        $controllerName = Inflector::classify($controller);
        $actionName = Inflector::classify($action);

        return $this->mapRoute("/$controller/$action/", $controllerName.'.'.$actionName);
    }
}
