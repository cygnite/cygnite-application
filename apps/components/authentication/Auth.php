<?php
/*
 * This file is part of the Cygnite package.
 *
 * (c) Sanjoy Dey <dey.sanjoy0@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Apps\Components\Authentication;

use Cygnite\Foundation\Application;
use Cygnite\Common\SessionManager\Session;

class Auth
{
    public $username;
    public $credentials = array();
    public $userInfo = array();
    public $data = array();
    public $msg = 'has authenticated successfully !';
    private $user;

    // Invalid Password Status Code
    const INVALID_PASSWORD = 100;

    // Invalid User Status Code
    const INVALID_USER = 101;

    //const AUTH_SUCCESS = 1;

    /**
     * @param User $instance
     */
    public function __construct(User $instance)
    {
        if ($instance instanceof User) {
            $this->user = $instance;
        }

        $this->table = $this->user->getTableName();
    }

    /**
     * We will validate user and return boolean value
     *
     * $input = array('email' => 'dey.sanjoy0@gmail.com', 'password' => 'xyz@324', 'status' => 1);
     * $auth = new Auth(new UserInfo($input));
     * $auth->validate();
     *
     * @return bool
     * @throws \Exception
     */
    public function validate()
    {
        $credentials = $this->setWhere();

        try {
            $userInfo = $this->user->findAll();
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }

        if ($userInfo->count() > 0) {

            if ( trim($userInfo[0]->password) == trim($credentials['password']) ) {

                $userInfo['isLoggedIn'] = true;
                $userInfo['flashMsg'] = ucfirst($this->username) . ' ' . $this->msg;

                $hasSession = $this->setSession($userInfo);
                $this->setUserInfo($userInfo);

                return ($hasSession) ? true : false;

            } else {

                return static::INVALID_PASSWORD;

            } // password validation end

        } else {

            return static::INVALID_USER;

        } // row count end

    }

    /**
     * Manually we can login users
     *
     * @param $user
     * @return bool
     */
    public function login($user)
    {
        return $this->validate($user);
    }

    private function setWhere()
    {
        $credentials = $this->user->credentials();
        $i = 0;
        foreach ($credentials as $key => $value) {

            if ($i === 0) {
                $this->username = $value;
                $this->user->where($key, '=', $value);
            }

            if ($i == 2 || $key == 'status') {
                $this->user->where($key, '=', $value);
            }

            $i++;
        }

        return $credentials;
    }

    private function getApplication()
    {
        return Application::instance();
    }

    private function setSession($userInfo)
    {
        $sessionInfo = $this->user->getSessionConfig();
        $data = array();

        foreach ($sessionInfo['value'] as $key => $val) {
            $data[$val] = $userInfo[0]->$val;
            unset($userInfo[0]->$val);
        }

        $app = $this->getApplication();
        $session = $app->make('Cygnite\Common\SessionManager\Session');
        $app['session'] = $app->share (function($c) use($session) {
            return $session;
        });
        return $session->store($sessionInfo['key'], $data);
    }

    /**
    * Check user logged in or not
     *
     * @param $key
    * @return boolean
    */
    public function isLoggedIn($key)
    {
        $app = $this->getApplication();

        if ($app['session']()) {
            //If user has valid session, and such is logged in
            $sessionArray = $app['session']()->get($key);
            if (!empty($sessionArray['isLoggedIn'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function rememberMe()
    {

    }

    public function attempts()
    {
    }

    /**
     * Magic Method for handling dynamic data access.
     */
    public function __get($key)
    {
        return $this->data[$key];
    }

    /**
     * Magic Method for handling the dynamic setting of data.
     */
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * We will destroy user session and logout current user
     */
    public function logout()
    {
        $app = $this->getApplication();

        $app['session']()->delete();
        Url::redirectTo(Url::getBase());
    }

    /**
     * We will set user information into Auth property
     * So that you can easily access those information directly
     * from the auth instance
     *
     * @param $userInfo
     */
    private function setUserInfo($userInfo)
    {
        foreach ($userInfo as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function __destruct()
    {
        unset($this->user);
    }
}
