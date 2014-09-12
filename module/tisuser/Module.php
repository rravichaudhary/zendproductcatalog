<?php

namespace tisuser;

use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\ModuleManager;
use tisuser\Model\UserTable;
use Zend\Authentication\Storage;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;

class Module {

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'tisuser\Model\AuthStorage' => function($sm) {
            return new \tisuser\Model\AuthStorage('');
        },
                'AuthService' => function($sm) {

            $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
            $dbTableAuthAdapter = new DbTableAuthAdapter($dbAdapter, 'users', 'username', 'password', 'MD5(?)');

            $authService = new AuthenticationService();
            $authService->setAdapter($dbTableAuthAdapter);
            //$authService->setStorage($sm->get('tisuser\Model\AuthStorage'));

            return $authService;
        },
                'user_table' => function($sm) {
            $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
            $table = new UserTable($dbAdapter);
            return $table;
        },
            ),
        );
    }

    public function getAutoloaderConfig() {

        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig() {
        $config = include __DIR__ . '/config/module.config.php';
        return $config;
    }

}
