<?php
namespace Apps\Components\Authx;

use Cygnite\Application;
use Apps\Components\Authx\UserDetails;


/**
 *  Cygnite Framework
 *
 *  An open source application development framework for PHP 5.3x or newer
 *
 *   License
 *
 *   This source file is subject to the MIT license that is bundled
 *   with this package in the file LICENSE.txt.
 *   http://www.cygniteframework.com/license.txt
 *   If you did not receive a copy of the license and are unable to
 *   obtain it through the world-wide-web, please send an email
 *   to sanjoy@hotmail.com so I can send you a copy immediately.
 *
 * @package              Apps
 * @subpackages          Components
 * @filename             Authentication
 * @description          This file is used to map all routing of the cygnite framework
 * @author               Sanjoy Dey
 * @copyright            Copyright (c) 2013 - 2014,
 * @link	             http://www.cygniteframework.com
 * @since	             Version 1.0
 * @filesource
 * @warning              Any changes in this library can cause abnormal behaviour of the framework
 *
 *
 */

class Authentication
{
    public $username;
    public $credentials = array();
    public $sessionDetails = array();
    private $auth;
    public $userData = array();
    public $msg = 'has authenticated successfully !';

    public function __construct(UserDetails $instance)
    {
        if ($instance instanceof UserDetails) {
            $this->auth = $instance;
        }

        $this->tableName = $this->auth->getTableName();

    }

    public function identifyUser()
    {
        $whereQuery= array();

        $i = 0;
        foreach ($this->auth->userCredentials as $key => $value) {
            if ($i===0) {
                    $whereQuery[$key.' ='] = $value;
                    $this->username  = $value;
            }

            if ($i==2 || $key == 'status') {
                $whereQuery["$key ="] = $value;
            }

            $i++;
        }

        try {
            $userCredentials= $this->auth->where($whereQuery)->findAll();

        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }

        if (($this->auth->rowCount() && count($userCredentials) ) > 0) {

            if (Encrypt::instance()->decode($userCredentials[0]->password) ==
                $this->auth->userCredentials['password']
            ) {
                $credentials['isLoggedIn'] =  true;
                $credentials['flashMsg'] = ucfirst($this->username).' '.$this->msg;

                $this->sessionDetails = $this->auth->getSessionConfig();

                foreach ($this->sessionDetails['value'] as $key => $val) {

                        $credentials[$val] =    $userCredentials[0]->$val;
                        unset($userCredentials[0]->$val);
                }

                $isSessionExists= Session::instance()->save(
                    $this->sessionDetails['key'],
                    $credentials
                );
                //show($isSessionExists);
                $this->setUserDetails($credentials);

                return ($isSessionExists == true) ?
                    true :
                    false;

            } else {

                return false;

            } // password validation end

        } else {

            return false;

        } // row count end

    }

    /*
    * Check user logged in or not
    * @return boolean
    *
    */
    public function isLoggedIn($loginKey)
    {
        if (Session::instance()) {
            //If user has valid session, and such is logged in
            $sessionArray = Session::instance()->retrieve($loginKey);
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

    private function setUserDetails($credentialArray)
    {
        foreach ($credentialArray as $key => $value) {
            $this->{$key} = $value;
        }

    }

   /**
     * Magic Method for handling dynamic data access.
     */
    public function __get($key)
    {
        return $this->userData[$key];
    }

    /**
     * Magic Method for handling the dynamic setting of data.
     */
    public function __set($key, $value)
    {
        $this->userData[$key] = $value;
    }

    public function logout()
    {
        Session::instance()->vanish();
        Url::redirectTo(Url::getBase());
    }

    public function __destruct()
    {
        unset($this->auth);
    }
}
