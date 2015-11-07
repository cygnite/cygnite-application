<?php
namespace Apps\Modules\Acme\Controllers;

use Cygnite\Mvc\View\Widget;
use Cygnite\Foundation\Application;
use Apps\Modules\Acme\Models\User;
use Cygnite\Mvc\Controller\AbstractBaseController;
use Cygnite\Helpers\Config;

class UserController extends AbstractBaseController
{
    /*
     * Your constructor.
     * @access public
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Default method for your controller. Render widget and return
     * @access public
     *
     */
   public function indexAction()
   {
       $users = array();
       //$users = User::all();
       return Widget::make('Acme:user', ['greet' => 'Hello! Widget'], function ($w)
       {
           /*
            | If you pass true for render method Widget
            | will understand you are trying to access module widget
            */
           return $w->render(true);
       });
   }
}
