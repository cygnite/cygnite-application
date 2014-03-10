<?php
if (!defined('CF_SYSTEM')) {
    exit('External script access not allowed');
}
/**
 *  Cygnite Framework
 *  Database Configuration Settings
 *
 *  An open source application development framework for PHP 5.3x or newer
 *
 *   License
 *
 *   This source file is subject to the MIT license that is bundled
 *   with this package in the file LICENSE.txt.
 *   http://www.appsntech.com/license.txt
 *   If you did not receive a copy of the license and are unable to
 *   obtain it through the world-wide-web, please send an email
 *   to sanjoy@hotmail.com so I can send you a copy immediately.
 *
 *@package               : Apps
 *@subpackages           : Configurations
 *@filename              : session.php
 *@description           : You can set your session configurations here.
 *@author                : Sanjoy Dey
 *@copyright             : Copyright (c) 2013 - 2014,
 *@link	                 : http://www.cygniteframework.com
 *@since	             : Version 1.2
 *@filesource
 *@warning               :  If you don't protect this directory from direct web access,
 * anybody will be able to see your database configuration and settings.
 *
 *
 */


return array(
   /**
    *--------------------------------------------------------------------------
    * Session Config
    *--------------------------------------------------------------------------
    * You can auto enable/disable cygnite session mechanism by
    * setting cf_session as true/false.
    * Cygnite will take care of rest.
    */
    'cf_session'       => false , //Set true or false to start session default is false

   /**
    *--------------------------------------------------------------------------
    * Session Name
    *--------------------------------------------------------------------------
    * You can set your application session name here.
    * Cygnite will take care of rest.
    */
    'cf_session_name'  => 'cf_secure_session',

    /*
    *--------------------------------------------------------------------------
    * Session Name
    *--------------------------------------------------------------------------
    * You can set your application default session storage path here. By default
    * All your session details will be store on apps/temp/sessions/ directory.
    * Keep save path as default.
    */
    'cf_session_save_path' => 'default', // Framework default Session path is apps/temp/sessions/


    /*
    *--------------------------------------------------------------------------
    * All these below configurations and features will be available on next versions
    *--------------------------------------------------------------------------
    *
    */
    'cf_session_cookie_name'   => '',    //Need to update code for next version
    'cf_session_timeout'       => 1440,  //Need to update code for next version
    'cf_session_auto_start'    => '',    //Need to update code for next version
    'cf_session_use_db'        => false, // Need to update code for next version
    'cf_session_db_name'       => '',    // Need to update code for next version
    'cf_session_table_name'    => 'cf_session', // Need to update code for next version
);