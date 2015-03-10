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

use Cygnite\Database\ActiveRecord;

/*
 * Cygnite Authentication component
 *
 * Make sure table "user" exists into the database specified
 * in this class.
 *
 * @author Sanjoy Dey <dey.sanjoy0@gmail.com>
 */

class User extends ActiveRecord
{
    private $credentials = array();

    //protected $tableName = 'user_info'; // override table name

    protected $database = 'cygnite';

    public $attributes = array();

    /**
     * Set user details in useCredential array
     *
     */
    public function __construct($credentials = array())
    {
        parent::__construct();
        $this->credentials = $credentials;
    }

    public function credentials()
    {
        return isset($this->credentials) ? $this->credentials : null;
    }

    public function getDbName()
    {
        return $this->database; // Your database name goes here
    }

    /*
     * Define your session key and table fields name to store if user authenticated successfully.
     *
     */
    public function getSessionConfig()
    {
        return array(
            'key' => 'user_info',
            'value' => array('id','username','email')
        );
    }
}
