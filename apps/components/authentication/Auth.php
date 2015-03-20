<?php
/*
 * This file is part of the Cygnite package.
 *
 * (c) Sanjoy Dey <dey.sanjoy0@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Application\Components\Authentication;

use Cygnite\Common\UrlManager\Url;
use Cygnite\Foundation\Application;
use Cygnite\Auth\AuthManager;
use Cygnite\Auth\AuthInterface;
use Cygnite\Auth\Exception\InvalidCredentialException;

class Auth extends AuthManager implements AuthInterface
{
    public $username;

    private $credential = array();

    public static $user = array();

    protected $item = array();

    public static $msg = 'Welcome! ';
    //protected $user;

    public $valid = false;

    public $attempt = 0;

    private $table;

    /**
     * Set User Credentials to authentication
     *
     * @param $credential
     */
    public function setCredential($credential)
    {
        $this->credential = $credential;
    }

    /**
     * Get user credentials
     *
     * @return array|null
     */
    public function getCredential()
    {
        return !empty($this->credential) ? $this->credential : null;
    }

    /**
     * Set user credentials into array
     *
     * @param      $user
     * @param null $password
     * @param bool $status
     * @return $this
     */
    protected function credential($user, $password = null, $status = false)
    {
        /**
        | We will check is array passed as first argument
        | then we will simply return Auth instance
         */
        if (is_array($user)) {
            $this->setCredential($user);
            return $this;
        }

        $credential = array();

        if ($status) {
            $credential = array('username' => $user, 'password' => $password, 'status' => $status);
        } else {
            $credential = array('username' => $user, 'password' => $password);
        }

        $this->setCredential($credential);

        return $this;
    }

    /**
     * We will validate user and return boolean value
     *
     * $input = array('email' => 'dey.sanjoy0@gmail.com', 'password' => 'xyz@324', 'status' => 1);
     * $auth = new Auth(new UserInfo($input));
     * $auth->verify();
     *
     * @param      $user
     * @param null $password
     * @param bool $status
     * @throws \Exception
     * @return bool
     */
    public function verify($user, $password = null, $status = false)
    {
        $this->table = $this->table();
        $credential = $this->credential($user, $password, $status)->getCredential();

        try {
            $userInfo = $this->setWhere()->findAll();
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }

        if ($userInfo->count() > 0) {

            if ( trim($userInfo[0]->password) == trim($credential['password']) ) {

                $this->valid = true;
                self::$user = $userInfo;
                return true;
            } else {
                $this->valid = false;
                $this->attempt++;
                $this->setError('password', 0);
                return false;
            } // password validation end

        } else {
            $this->valid = false;
            $this->attempt++;
            $this->setError('user', 0);
            return false;

        } // no user found
    }

    /**
     * @return array|null
     */
    private function setWhere()
    {
        $credentials = $this->getCredential();

        $i = 0;
        foreach ($credentials as $key => $value) {

            if ($i == 0) {
                $this->username = $value;
                echo $value;
                $where = static::model()->where($key, '=', $value);
            }

            if ($i == 2 || $key == 'status') {
                $where = static::model()->where($key, '=', $value);
            }

            $i++;
        }

        return $where;
    }

    /**
     * We will make Auth instance and return singleton
     * instance to the user
     *
     * @return object
     */
    public static function make()
    {
        $app = self::getContainer();
        $auth = __CLASS__;
        return $app->singleton('auth', function($c) use($auth)
        {
            return new $auth;
        });
    }

    /**
     * Manually we can login users
     *
     * @throws \Cygnite\Auth\Exception\InvalidCredentialException
     * @return boolean
     */
    public function login()
    {
        if ($this->valid) {
            $this->valid = true;
            return $this->createSession();
        } else {

            $credential = $this->getCredential();
            if (empty($credential)) {
                throw new InvalidCredentialException('Please set credential using Auth::setCredential($credential) to login.');
            }

            if ($valid = $this->verify($credential)) {
                return ($valid) ? $this->createSession() : $valid;
            }
        }
    }

    /**
     * @return bool
     */
    private function createSession()
    {
        $userInfo['isLoggedIn'] = true;
        $userInfo['flashMsg'] = static::$msg.ucfirst($this->username);
        $hasSession = $this->setSession($userInfo);
        $this->setUserInfo(self::$user);

        return ($hasSession) ? true : false;
    }

    /**
     * @param $userInfo
     * @return mixed
     */
    private function setSession($userInfo)
    {
        $data = array();
        foreach (self::$user[0]->getAttributes() as $key => $val) {
            $data[$key] = $val;
        }

        $app = self::getContainer();

        /*
        | @todo:
        | Session need to be globally accessible from container
        | we will remove sharing session instance here
        */
        $app['session'] = $app->share (function($c) {
            return $c->make('Cygnite\Common\SessionManager\Session');
        });

        return $app['session']()->store('auth:'.trim($this->table), $data);
    }

    /**
     * Check user logged in or not
     *
     * @param $key
     * @return boolean
     */
    public function isLoggedIn($key)
    {
        $app = self::getContainer();

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

    /**
     * Return number of un-successful attempt by user
     *
     * @return int
     */
    public function attempts()
    {
        return $this->attempt;
    }

    /**
     * We will set authentication error as property
     *
     * @param $key
     * @param $value
     */
    private function setError($key, $value)
    {
        $this->{$key} = $value;
    }

    /**
     * Magic Method for handling dynamic data access.
     */
    public function __get($key)
    {
        return $this->item[$key];
    }

    /**
     * Magic Method for handling the dynamic setting of data.
     */
    public function __set($key, $value)
    {
        $this->item[$key] = $value;
    }

    /**
     * We will destroy current user session and return to
     * application base url
     */
    public function logout()
    {
        $app = self::getContainer();
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
}
