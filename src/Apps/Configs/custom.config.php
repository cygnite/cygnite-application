<?php
use Cygnite\Foundation\Application as App;

if (!defined('CF_SYSTEM')) {
    exit('External script access not allowed');
}

return [
    'view.path' => __DIR__.'../'.'Views/',

    'view.widget.path' => __DIR__.'../'.'Views/Widgets/'
];