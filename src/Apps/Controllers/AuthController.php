<?php
namespace Apps\Controllers;

use Cygnite\Common\Encrypt;
use Cygnite\Http\Requests\Request;
use Cygnite\Http\Responses\Response;
use Apps\Middleware\Authentication\Auth;
use Cygnite\Mvc\Controller\AbstractBaseController;

class AuthController extends AbstractBaseController
{
    protected $templateEngine = false;
    
    private $auth;

    /**
     * Your constructor.
     *
     * @access public
     */
    public function __construct()
    {
        // Set the user model to authenticate user
        $this->auth = Auth::model(\Apps\Models\User::class);
    }

    /**
     * Authenticate user and login into the system.
     *
     * @param \Cygnite\Http\Requests\Request $request
     * @return array
     */
    public function checkAction(Request $request)
    {
        $crypt = new Encrypt;// mcrypt library is deprecated in PHP 7.1. So use alternative.
        $credentials = [
            'username' => $request->post->get('username'),
            'password' => $crypt->encode($request->post->get('password'))
        ];

        if ($this->auth->credential($credentials)->login()) {
            $userInfo = $this->auth->userInfo();
            return ['status' => true, 'user' => $userInfo];
        }

        return ['status' => false, 'user' => []];
    }

    /**
     * Destroy the session and Logout the user.
     *
     * @return \Cygnite\Http\Responses\JsonResponse
     */
    public function logoutAction()
    {
        $this->auth->logout(false);
        return Response::json(['status' => true, 'user' => []]);
    }
}
