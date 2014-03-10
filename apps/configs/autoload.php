<?php
namespace Cygnite;

if (!defined('CF_SYSTEM')) {
    exit('External script access not allowed');
}
/**
 *  Cygnite Framework
 *  Autoloader Configuration Settings
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
 *@package                  :  Apps
 *@subpackages              :  Configurations
 *@filename                 :  autoload
 *@description              :  This file is used to specify which files should be register
 *                             on cygnite engine by default.
 *@author                   :  Sanjoy Dey
 *@copyright                :  Copyright (c) 2013 - 2014,
 *@link	                    :  http://www.cygniteframework.com
 *@since	                :  Version 1.0
 *@filesource
 *@warning                  :  If you don't protect this directory from direct web access,
 *                             anybody will be able to see your configuaration and settings.
 *
 *
 */
return array(

   /*---------------------------------------------------------------------------
    * Auto load Libraries
    *---------------------------------------------------------------------------
    * You can specify multiple numbers of libraries here to register on
    * Cygnite Engine during runtime. Don't worry about the application
    * performance because all libraries are lazy loaded. But filename,
    * Class Name should be  same and start with CF prefix. When you
    * are requesting the class it will create singleton and return
    *  you the object.
    *
    *  Specify your class name and path here. You can register core
    *  as well as user defined libraries here. That's all. Cygnite will
    *  take care of rest.
    */
    // Application::load()->registerClasses(
        // array(
            // 'Cache'     => '\\Cygnite\\Libraries\\Cache\\Handler\\Cache',
            // 'Mailer'     => '\\Cygnite\\Libraries\\Mailer',
            // 'Authx'     => '\\Apps\\Components\\Authx\\Authentication',
            // 'Userdetails'  => '\\Apps\\Components\\Authx\\Userdetails',
            // 'Image'  => '\\Apps\\Components\\Thumbnail\\Image',
			// 'Ctool'  => '\\Apps\\Generator\\Crud\\Ctool',
        // )
    // ),
  /*
    *---------------------------------------------------------------------------
    * Autoload Helpers
    *---------------------------------------------------------------------------
    * Load your helpers when cygnite initialize. Which will be available
    * globally on your application. But we prefer import your helpers
    * when needed else it may cause of slow application.
    * This feature is inprogress.
    */
     'helpers' => array(''),

  /*
    *---------------------------------------------------------------------------
    * Auto load Models
    *---------------------------------------------------------------------------
    * Autoload your models when cygnite boot up. All models will be dynamically
    * loaded when you try to access model functions. Please register your
    * all models here so that you can directly access. Don't worry about
    * application performance since cygnite follows dynamic autoload. You
    * can register n numbers of models in cygnite robot loader.
    */
    Application::load()->registerDirectories(
        array(
            'apps.controllers',
            'apps.models',
            'apps.components.authx',
            'apps.components.thumbnail',
            'apps.extensions'
        )
    )
);
