<?php
namespace Cygnite;

if (!defined('CF_SYSTEM')) {
    exit('External script access not allowed');
}
/**
 *  Cygnite Framework
 *  Auto loader Configuration Settings
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
    * Register all your directories to auto load your files.
    *---------------------------------------------------------------------------
    * You can specify multiple numbers of directories here to register on
    * Cygnite Engine during runtime. Don't worry about the application
    * performance because all libraries are lazy loaded. But filename,
    * class name and file should be same, StudlyCaps.
    *
    *  Specify your directory path here. That's all. Cygnite will
    *  take care of rest.
    */
    Application::instance()->registerDirectories(
        array(
            'apps.controllers',
            'apps.modules',
            'apps.configs.definitions',
            'apps.models',
            'apps.components.authx',
            'apps.components.thumbnail',
            'apps.extensions'
        )
    )
);