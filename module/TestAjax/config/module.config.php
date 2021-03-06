<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'TestAjax\Controller\Skeleton' => 'TestAjax\Controller\SkeletonController',
            'TestAjax\Controller\Customers' => 'TestAjax\Controller\CustomersController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'TestAjax' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/testajax',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'TestAjax\Controller',
                        'controller'    => 'Skeleton',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'        =>  '[0-9]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),

                ),
            ),
            'customers' => array(
                'type'  =>  'Literal',
                'options' => array(
                    'route' => '/customers',
                    'defaults' => array(
                        'controller' => 'TestAjax\Controller\Customers',
                        'action' => 'list'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // LIST
                    'list' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:page]',
                            'defaults' => array(
                                'controller' => 'TestAjax\Controller\Customers',
                                'actions' => 'list',
                            ),
                        ),
                    ),
                    // PAGINATION
                    'pager' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/pager[/:page]',
                            'defaults' => array(
                                'controller' => 'TestAjax\Controller\Customers',
                                'actions' => 'pager',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'template_map' => array(
            'customers-content' => __DIR__.'/../view/customers/customers-content.phtml',
        ),
    ),

    /*
     * if you're using AssetManager module, you can save assets in your module's public
     * assetmanager module can be install by require "rwoverdijk/assetmanager": "*" in your composer.json
     * 'asset_manager' => array(
         'resolver_configs' => array(
             'paths' => array(
                 'TestAjax' => __DIR__ . '/../public',
             ),
         ),
     ), */

);