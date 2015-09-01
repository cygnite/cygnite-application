<?php
namespace Apps\Modules\Demo\Controllers;

use Cygnite\Mvc\Controller\AbstractBaseController;

class IndexController extends AbstractBaseController
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
       echo "Demo Index";
   }
}//End of your controller

