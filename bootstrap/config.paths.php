<?php
return [
    'app.path' => CYGNITE_BASE.'/src/Apps/',

    'app.namespace' => 'Apps',

    'app.config' => [

        'directory' => 'Configs/',

        /*
         | If you wish to have separate custom configuration file.
         | You need to add file name in below array, Cygnite
         | Will load your configuration file.
         */
        'files' => [
           'custom' => 'custom.config',
           'module' => 'module',
        ],

        'defination' => '',
    ],

    'routes.dir' => 'Routing/',

    'assets.path' => CYGNITE_BASE.'/public/assets',

    'storage.path' => CYGNITE_BASE.'/public/storage/',

    'core.path' => CYGNITE_BASE.'/vendor/cygnite/',
];