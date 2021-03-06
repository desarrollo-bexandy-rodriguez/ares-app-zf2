<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'autenticado' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/autenticado',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Usuarios',
                        'action'        => 'autenticado',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        ),
     //   'aliases' => array(
     //       'translator' => 'MvcTranslator',
     //   ),
    ),
    'translator' => array(
        'locale' => 'es_ES',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Usuarios' => 'Application\Controller\UsuariosController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/403'               => __DIR__ . '/../view/error/403.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Inicio',
                'route' => 'home',
            ),
            array(
                'label' => 'Clientes',
                'route' => 'clientes',
                'controller' => 'Clientes\Controller\Index',
                'action' => 'index',
            ),
            array(
                'label' => 'Ventas',
                'route' => 'pedido',
                'controller' => 'Pedidos\Controller\Pedido',
                'action' => 'index',
            ),
            array(
                'label' => 'Despacho',
                'route' => 'despacho',
                'controller' => 'Despacho\Controller\Index',
                'action' => 'index',
            ),
            array(
                'label' => 'Tienda',
                'route' => 'application/default',
                'controller' => 'index',
                'action' => 'tienda',
            ),
            array(
                'label' => 'Administración',
                'route' => 'application/default',
                'controller' => 'index',
                'action' => 'admin',
            ),
            array(
                'label' => 'Reportes',
                'route' => 'reportes',
            ),
            array(
                'label' => 'Solicitar Productos',
                'route' => 'agotado',
                'controller' => 'Almacen\Controller\Merma',
                'action' => 'index',
                'class' => 'btn btn-warning navbar-btn custom-btn',
                'resource' => 'Despacho',
                'privilege' => 'acceder'
            ),

        ),
    ),
    /*
    'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => (__DIR__.'/../src/Application/Entity'),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' => 'application_entities',
                ),
            ),
        ),
    ),
    */
);
