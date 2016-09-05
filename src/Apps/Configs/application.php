<?php
if (!defined('CF_SYSTEM')) {
    exit('External script access not allowed');
}
/**
 *  Cygnite Framework
 *  Global Application Configurations
 *
 *  An open source application development framework for PHP 5.4x or newer
 *
 *  License
 *
 *  This source file is subject to the MIT license that is bundled
 *  with this package in the file LICENSE.
 *  http://www.cygniteframework.com/LICENSE.html
 *  If you did not receive a copy of the license and are unable to
 *  obtain it through the world-wide-web, please send an email
 *  to dey.sanjoy0@gmail.com so I can send you a copy immediately.
 *
 * @package       :  Apps
 * @subpackages   :  Configs
 * @filename      :  application
 * @description   :  You can set all your global configurations here.
 * @author        :  Sanjoy Dey
 * @copyright     :  Copyright (c) 2013 - 2015,
 * @link          :  http://www.cygniteframework.com
 * @since         :  version 1.0
 * @warning       :  If you don't protect this directory from direct web access,
 * anybody will be able to see your configuration and settings.
 *
 */

return [
    /*
     |--------------------------------------------------------------------------
     | Your Application Base URL
     |--------------------------------------------------------------------------
     | The base URL used to import your application assets in your web page.
     | Based on base url we will perform page redirect and other internal
     | functionality.
     |
     */
    'base_path' => '',
    /*
    |--------------------------------------------------------------------------
    | Your Application Default Controller
    |--------------------------------------------------------------------------
    | Set your application default controller here. Default controller
    | will be called when you try to access cygnite application.
    */
    'default.controller' => 'Home',
    /*
    |--------------------------------------------------------------------------
    | Your Application Default Method
    |--------------------------------------------------------------------------
    | You can set your application default method here. By default we
    | we will call index method of your controller.
    | You can also change the default method.
    |
    */
    'default.method' => 'index',

    /*
    |---------------------------------------------------------------------------
    | Set Application Environment
    |---------------------------------------------------------------------------
    | You can set your application environment in order to handle errors and exceptions.
    | Development mode all errors are turned on. So that you can able to fix all issues easily.
    | Errors will be turned off in production server mode.
    |
    | Example :
    | environment => 'development/production'
    */
    'environment' => 'development', //Errors are turned on in development environment


    /*
     | --------------------------------------------------------------------------
     | Active Application Event Middleware
     | --------------------------------------------------------------------------
     | By Default event middle wares are deactivated, You can activate or de-activate
     | event middle-wares by setting true or false.
     | All events will register and set into Cygnite IoC container.
     |
     */
    'activate.event.middleware' => false,

    /*
    |--------------------------------------------------------------------------
    | Your Application Character Encoding
    |--------------------------------------------------------------------------
    | Here you can set your application default character encoding . This encoding
    | will be used by the Str, Text, Form, and any other classes that need
    |  to know what type of encoding to use for your generous application.
    |
    */
    'encoding' => 'UTF-8',
    /*
    |--------------------------------------------------------------------------
    | Your Application Language
    |--------------------------------------------------------------------------
    | You can set your application default language here. Language library will
    | will take care rest.
    */
    'locale' => 'es',

    'fallback.locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    | You can set your application timezone here.This timezone will
    | be used when cygnite need date time or any internal features.
    |
    */
    'timezone' => 'UTC',
    /*
    |--------------------------------------------------------------------------
    |  Application Encryption key
    |--------------------------------------------------------------------------
    | Set your encryption key here. You must set your encryption key here in order to
    | use cygnite secure encryption and session library. We used php mcrypt extension
    | library for encryption library. So please check whether you have else please activate
    | to work with secure encryption and session library.
    */
    'encryption.key' => 'cygnite-shaXatBNHQ4',

    /*
    |--------------------------------------------------------------------------
    | Your Application Cache Configurations
    |--------------------------------------------------------------------------
    | You can configure your file caching technique here. Cygnite provides
    | different types of cache driver as File, Memcache, APC to boost your
    | application performance. Follow user guide for usages.
    */
    'cache' => [

        'memcached' => [

            'autoconnnect' => false,

            'uniqueId' => 'CYGNITE_',

            'servers' => [
                'host' => '127.0.0.1', 'port' => 11211, 'weight' => 50
            ],
        ],

        'file' => [
            /*
            |---------------------------------------------------------------------------
            | Cache Name
            |---------------------------------------------------------------------------
            | Set your cache name here to generate cache file name if you are
            | using cygnite file caching technique.
            */
            'name' => 'file.cache',
            /*
            |---------------------------------------------------------------------------
            | Cache Extension
            |---------------------------------------------------------------------------
            | Set your cache extension here. Cygnite will take care of rest. Cache will
            | store with same extension which you will provide here.
            |
            */
            'extension' => '.cache',

            /*
            |---------------------------------------------------------------------------
            | Cache Storage Location
            |---------------------------------------------------------------------------
            | Set your cache file storage location here. By default we are using
            | temp/cache.
            |
            */
            'directory' => 'public.storage.cache',
        ],

        'redis' => [
            /*
             | 'connection' => 'default'
             |
             | 'connection' => 'servers' [
             |      [
             |       'scheme' => 'tcp',
             |       'host' => '10.0.0.1',
             |       'port' => 6379
             |      ],
             |      [
             |       'scheme' => 'tcp',
             |       'host' => '127.0.0.1',
             |       'port' => 6379
             |      ],
             |     'options' => ['prefix' => 'cygnite']
             |  ]
             |
             */
            'connection' => 'default',
        ],
    ],

    'logs' => [

        /*
         |-------------------------------------------------------------
         | Log application errors
         |-------------------------------------------------------------
         | If you activate (true/false) debugger will generate error logs
         | into public/storage/logs/
         |
         */
        'activate' => true,

        /*
        |------------------------------------------------------------
        | Logs Storage Location
        |------------------------------------------------------------
        | Set your log storage location here. By default we are using
        | public/storage/logs/
        |
        */
        'path'     => 'public.storage.logs',

        /*
         | Activate error emailing. When any error occur in production
         | mode debugger will trigger email. Set true or false
         */
        'error.emailing' => false,

        /*
        | We will make use of email address to send error log
        | when application is in production mode.
        |
        */
        'email' => 'dey.sanjoy0@gmail.com',
    ],

    /*
     * Email Configurations
     */
    'email.configurations' => [

        'protocol' => 'smtp',

        'smtp' => [
            'host' => 'smtp.gmail.com',
            'username' => 'your gmail id',
            'password' => 'your password',
            'port' => '465',
            'encryption' => 'ssl',
        ],
        'sendmail' => [
            'path' => '/usr/sbin/exim -bs'
        ],

    ],

    /*
     * Uses Cartalyst Stripe package
     *
     * Add a entry in the composer.json to install and uncomment out
     * below 'stripe.config' line
     *
     * "cartalyst/stripe": "~1.0",
     *
     * Stripe Payment gateway API Client
     */
    //'stripe.config' => include __DIR__.DS.'stripe'.EXT,

    /*
     * Uses Omnipay package
     *
     * Add a entry in the composer.json to install and uncomment out
     * below 'omnipay.config' line
     *
     * "omnipay/omnipay": "~2.0",
     *
     * Payment gateway API client for Multiple Services
     */
    //'omnipay.config' => include __DIR__.DS.'omnipay'.EXT,

    /*
     * Uses PHPoAuthLib package
     *
     * Add a entry in the composer.json to install and uncomment out
     * below 'social.config' line
     *
     * "lusitanian/oauth": "~0.3"
     *
     * Authenticate using OAuth client through many social API
     */
    //'social.config' => include __DIR__.DS.'socialauth'.EXT,

    //'params' => include __DIR__.DS.'param'.EXT,
];
