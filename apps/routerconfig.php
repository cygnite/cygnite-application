<?php

if (!defined('CF_SYSTEM')) {
    exit('No External script access allowed');
}
/**
 *  Cygnite Framework
 *
 *  An open source application development framework for PHP 5.3 or newer
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
 * @Package               :  Apps
 * @Sub Packages          :
 * @Filename              :  routerconfig.php
 * @Description           :  This file is used to set all routing configurations
 * @Author                :  Cygnite dev team
 * @Copyright             :  Copyright (c) 2013 - 2014,
 * @Link	              :  http://www.cygniteframework.com
 * @Since	              :  Version 1.0
 * @FileSource            :  http://www.cygniteframework.com
 * @warning               :  Any changes in this library can cause abnormal behaviour of the framework
 * @todo                  :  Multiple routing configurations have to implemented and have to simplify
 *                           core code for routing feature, have to add more filter validation.
 *
 */
return array(
    '/sayhello/(\w+)' => 'home.welcome',
    '/blog(/\d{4}(/\d{2}(/\d{2}(/[a-z0-9_-]+)?)?)?)?' => 'home.category'
);
