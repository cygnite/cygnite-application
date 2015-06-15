<?php
namespace Apps\Configs\Definitions;

if (!defined('CF_SYSTEM')) {
    exit('External script access not allowed');
}

/**
 * trait DefinitionManagerTrait
 *
 * Define all your property dependencies. Cygnite will
 * inject your dependency at run time.
 *
 * @package Apps\Configs\Definitions
 */
trait DefinitionManagerTrait
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
     *              'api' => 'apps.resources.extensions.api'
     *           ),
     *          'ProductsController' => [
     *             'social' => 'apps.resources.extensions.social-share',
     *          ],
     *     ];
     *  </code>
     *
     */
    public function getPropertyDependencies()
    {
        return [
            'ProductController' => [
                  'social' => 'apps.resources.extensions.social-share',
            ],
        ];
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
        return [
            'CustomInterface' => 'Apps\Resources\Extensions\\Custom'
        ];
    }
}