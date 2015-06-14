<?php
namespace Apps\Configs\Definitions;

if (!defined('CF_SYSTEM')) {
    exit('External script access not allowed');
}

/**
 * Class DefinitionManager
 * Define all your property dependencies. Cygnite will
 * inject your dependency at run time.
 *
 * @package Apps\Configs\Definitions
 */
class DefinitionManager
{

    /**
     * Set controller property dependencies here.
     * Cygnite will inject all your dependencies at runtime
     *
     * @return array
     *  <code>
     *     return
     *     [
     *          'HomeController' => [
     *              'service' => 'apps.extensions.general',
     *              'api' => 'apps.extensions.api'
     *           ),
     *          'ProductsController' => [
     *             'social' => 'apps.extensions.social-share',
     *          ],
     *     ];
     *  </code>
     *
     */
    public function getPropertyDependencies()
    {
        return array();
    }

    /**
     *
     * @return type
     *  <code>
     *     return
     *     [
     *         'GeneralInterface' => '\\Apps\\Extensions\\General',
     *         'ORM' => '\\Cygnite\\Database\\ActiveRecord',
     *     ];
     *  </code>
     */
    public function registerAlias()
    {
        return [];
    }
}