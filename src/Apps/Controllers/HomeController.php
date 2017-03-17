<?php
namespace Apps\Controllers;

use Cygnite\Http\Responses\Response;
use Cygnite\Mvc\Controller\AbstractBaseController;

class HomeController extends AbstractBaseController
{
    /**
    * --------------------------------------------------------------------------
    * The Default Controller
    *--------------------------------------------------------------------------
    *  This controller respond to uri beginning with home and also
    *  respond to root url like "home/index"
    *
    * Your GET request of "home/index" will respond like below -
    *
    *     public function indexAction() : Response
    *     {
    *         return new Response("Cygnite: Hello World!!");
    *     }
    * Note: By default cygnite doesn't allow you to pass query string in url, which
    * consider as bad url format.
    *
    * You can also pass parameters into the function as below-
    * Your request to  "home/profile/2134" will pass to
    *
    *      public function profileAction($id)
    *      {
    *          return new Response("Cygnite: Your Profile Id Is $id");
    *      }
    * In case if you are not able to access parameters passed into method
    * directly as above, you can also get the uri segment
    *  echo Url::segment(3);
    *
    * That's it you are ready to start your awesome application with Cygnite Framework.
    *
    */

    protected $layout = 'layouts.home';

    protected $templateEngine = false;

   // protected $templateExtension = '.html.twig';

   //protected $autoReload = true;
     
    /**
     * Default method for your controller. Render welcome page to user.
     * @access public
     *
     */
   public function indexAction() : Response
   {
       $content = $this->view->create('Apps.Views.home.welcome', ['title' => 'Welcome to Cygnite Framework']);

       return new Response($content);
   }
   
}
