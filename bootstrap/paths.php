<?php
$paths = [
    /**
     * ----------------------------------------------------------
     * Root
     * ----------------------------------------------------------
     *
     * "root" => The root directory
     */
    "root" => realpath(__DIR__ . "/.."),

    /**
     * ----------------------------------------------------------
     * Source
     * ----------------------------------------------------------
     *
     * "src" => The application source directory
     */
    "src" => realpath(__DIR__ . "/../src"),

    /**
     * ----------------------------------------------------------
     * Vendor
     * ----------------------------------------------------------
     *
     * "vendor" => The vendor directory
     */
    "vendor" => realpath(__DIR__ . "/../vendor"),

    /**
     * ----------------------------------------------------------
     * Public
     * ----------------------------------------------------------
     *
     * "public" => The public directory
     */
    "public" => realpath(__DIR__ . "/../public/"),

    "app.namespace" => "Apps",

    'app.path' => realpath(__DIR__.'/../src/Apps/'),

    'app.config' => realpath(__DIR__.'/../src/Apps/Configs/'),

    'routes.dir' => realpath(__DIR__.'/../src/Apps/Routing/'),

     /*'assets.path' => realpath(CYGNITE_BASE.'/public/assets'),

     'storage.path' => realpath(CYGNITE_BASE.'/public/storage/'),

     'core.path' => realpath(__DIR__.'/../vendor/cygnite/'),*/
];

/*
 |-------------------------------------------------------------------
 | Register Composer PSR Auto Loader
 |-------------------------------------------------------------------
 |
 | Composer is the convenient way to auto load all dependencies and
 | classes. We will simple require it here, so that we don't need
 | worry about importing classes manually.
 */
require __DIR__ . "/../vendor/autoload.php";

return $paths;
