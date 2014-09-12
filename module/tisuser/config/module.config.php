<?php

return array(

	  'controllers' => array(
        'invokables' => array(
            'auth/user_controller' => 'tisuser\Controller\UserController',
        ),
		),
		  'view_manager' => array(
        'template_path_stack' => array(
            'tisuser' => __DIR__ . '/../view',
        ),
    ),
	
	
	
	
	   'router' => array(
        'routes' => array(
            'auth_user' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/user[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'auth/user_controller',
                        'action'     => 'index',
                    ),
                ),
            ),
			'login' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/login',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'auth/user_controller',
                        'action'     => 'login',
                    ),
                ),
            ),
			'logout' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/logout',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'auth/user_controller',
                        'action'     => 'logout',
                    ),
                ),
            ),
			
        ),
    ),
		
	
	);
