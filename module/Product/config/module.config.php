<?php

return array(
    'controllers'     => array(
        'invokables' => array(
           'product/product_controller' => 'Product\Controller\ProductController',
        	'product/category_controller' => 'Product\Controller\CategoryController',
           
        ),
    ),
    'view_manager'    => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
       
        'template_path_stack'      => array(
            'states' => __DIR__ . '/../view',
        ),
        'strategies'               => array(
            'ViewJsonStrategy',
        ),
    ),
    'router'          => array(
        'routes' => array(
            'product' => array(
                'type'          => 'Segment',
                'options'       => array(
                    'route'    => '/product[/:action][/:id]',
					 'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]+',
                            ),
                    'defaults' => array(
                        'controller' => 'product/product_controller',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes'  => array(
                    'slash'       => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/',
                            'defaults' => array(
                                'controller' => 'product/product_controller',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                ), 
            ),
        'category' => array(
        				'type'          => 'Segment',
        				'options'       => array(
        						'route'    => '/category[/:action][/:id]',
        						'constraints' => array(
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'product/category_controller',
        								'action'     => 'index',
        						),
        				),
        				'may_terminate' => true,
        				
        		),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
        // 'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory', 
        ),
    ), 
	'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Product/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Product\Entity' => 'application_entities'
                )
            ))), 
//	'navigation' => array(
//		'default' => array(
//				array(
//						'label' => 'Home',
//						'route' => 'admin',
//					 ),
//				array(
//						'label' => 'User Management',
//						'route' => 'admin/child',
//						'pages' => array(
//										'label' => 'Add New User',
//										'route' => 'admin/child',
//										),
//					),
//			),
//			),
);
