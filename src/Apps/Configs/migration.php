<?php
namespace Cygnite\Database;

if (!defined('CF_SYSTEM')) {
    exit('External script access not allowed');
}

/**
 *
 * <code>
 * 'connection'  => 'your-database',
 * 'migration_path' => 'migration-directory',
 * 'migration_table' => 'migration-table-name',
 *
 * </code>
 *
 * Example :
 * cd console/bin
 * php cygnite migrate:init create_products_table 
 * php cygnite migrate
 */


return [
    'connection' => 'cygnite', //If you don't specify your connection name Cygnite will take default database 
    //connection to generate your migrations

    'migration_path' => 'apps.migrations',

    'migration_table' => 'migrations',

];
