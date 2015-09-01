<?php
if (!defined('CF_SYSTEM')) {
    exit('External script access not allowed');
}

return [
    /**
     * Set controller property dependencies here.
     * Cygnite will inject all your dependencies at runtime
     *
     * @return array
     *  <code>
     *  'property.definition' [
     *          'HomeController' => [
     *              'api' => 'apps.resources.extensions.api'
     *           ),
     *          'ProductController' => [
     *             'social' => 'apps.resources.extensions.social-share',
     *          ],
     *  ];
     *  </code>
     *
     */
    'property.definition' =>  [
        'HomeController' => [
            //'social' => 'apps.resources.extensions.social-share',
        ],
    ],

    /**
     *
     * @return type
     *  <code>
     *  'register.alias' =>  [
     *         'GeneralInterface' => '\\Apps\\Extensions\\General',
     *         'ORM' => '\\Cygnite\\Database\\ActiveRecord',
     *  ];
     *  </code>
     */

    'register.alias' => [
        //'CustomInterface' => 'Apps\Resources\Extensions\Custom'
    ]
];