<?php
namespace Apps\Modules\Admin\Controllers;

use Cygnite\Mvc\View\Widget;
use Cygnite\Foundation\Application;
use Apps\Modules\Admin\Models\User;
use Cygnite\Mvc\Controller\AbstractBaseController;

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
   public function indexAction($id)
   {
        $users = array();
        //$user = User::all();
        return Widget::make('modules::admin::user', array('msg' => 'Hello! Widget', 'users' => $user));
   }
}//End of your controller
