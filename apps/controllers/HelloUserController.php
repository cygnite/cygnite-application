<?php
namespace Apps\Controllers;

use Cygnite\AbstractBaseController;
use Cygnite\Application;

class HelloUserController extends AbstractBaseController
{
    /**
    * --------------------------------------------------------------------------
    * The Default Controller
    *--------------------------------------------------------------------------
    *  This controller respond to uri beginning with welcomeuser and also
    *  respond to root url like "home/index"
    *
    * Your GET request of "home/form" will respond like below -
    *
    *      public function formAction()
    *     {
    *            echo "Cygnite : Hellow ! World ";
    *     }
    * Note: By default cygnite doesn't allow you to pass query string in url, which
    * consider as bad url format.
    *
    * You can also pass parameters into the function as below-
    * Your request to  "home/form/2134" will pass to
    *
    *      public function action_form($id = ")
    *      {
    *             echo "Cygnite : Your user Id is $id";
    *      }
    * In case if you are not able to access parameters passed into method
    * directly as above, you can also get the uri segment
    *  echo Url::segment(3);
    *
    * That's it you are ready to start your awesome application with Cygnite Framework.
    *
    */

    private $author = 'Sanjoy Dey';

    private $country = 'India';

    //protected $layout = 'layout.users';

    protected $templateEngine = true;

   // protected $templateExtension = '.html.twig';

   protected $autoReload = true;

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
     * Default method for your controller. Render welcome page to user.
     * @access public
     *
     */
   public function indexAction($id)
   {
        echo "Hello Users $id";exit;
   }

   public function testingAction()
   {
       echo "Hello testing goes here";
   }

}//End of your home controller
