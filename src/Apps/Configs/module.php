<?php
use Cygnite\Foundation\Application as App;

if (!defined('CF_SYSTEM')) {
    exit('External script access not allowed');
}

return [
    'module.path' => realpath(__DIR__.'/../'.'Modules/'),

    'module.config' => 'Configs',
];
