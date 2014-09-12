<?php

namespace ACL;




use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
class Module{

public function onBootstrap(MvcEvent $e) {
    $this -> initAcl($e);
    $e -> getApplication() -> getEventManager() -> attach('route', array($this, 'checkAcl'));
}

public function initAcl(MvcEvent $e) {
 
    $acl = new \Zend\Permissions\Acl\Acl();
    $roles = include __DIR__ . '/config/module.acl.roles.php';
    $allResources = array();
    foreach ($roles as $role => $resources) {
 
        $role = new \Zend\Permissions\Acl\Role\GenericRole($role);
        $acl -> addRole($role);
 
        $allResources = array_merge($resources, $allResources);
 
        //adding resources
        foreach ($resources as $resource) {
             // Edit 4
             if(!$acl ->hasResource($resource))
                $acl -> addResource(new \Zend\Permissions\Acl\Resource\GenericResource($resource));
        }
        //adding restrictions
        foreach ($allResources as $resource) {
            $acl -> allow($role, $resource);
        }
    }
    //testing
    //var_dump($acl->isAllowed('admin','home'));
    //true
 
    //setting to view
    $e -> getViewModel() -> acl = $acl;
 
}

public function checkAcl(MvcEvent $e) {
    $route = $e -> getRouteMatch() -> getMatchedRouteName();
    //you set your role
    $userRole = 'guest';
 
    if ($e -> getViewModel() -> acl ->hasResource($route) && !$e -> getViewModel() -> acl -> isAllowed($userRole, $route)) 
    {
        $response = $e -> getResponse();
        //location to page or what ever
        $response -> getHeaders() -> addHeaderLine('Location', $e -> getRequest() -> getBaseUrl() . '/404');
        $response -> setStatusCode(404);
 
    }
}
public function getConfig(){

return include __DIR__.'/config/module.config.php';
}

public function getAutoloaderConfig(){

return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );

}

public function getDbRoles(MvcEvent $e){
    // I take it that your adapter is already configured
    $dbAdapter = $e->getApplication()->getServiceManager()->get('Zend\Db\Adapter\Adapter');
    $results = $dbAdapter->query('SELECT * FROM acl');
    // making the roles array
    $roles = array();
    foreach($results as $result){
        $roles[$result['user_role']][] = $result['resource'];
    }
    return $roles;
}


}




?>
