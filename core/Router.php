<?php

class Router  
{
    private $method;
    
    private $data;
    
    public static $route_registry = [];
        
    public function __construct(){
        
    }
    
    
    public static function handleURLRequest($url) {
        
        $url = substr($url, 1);
        
        $action_trigger = false;
        
        self::__resolveURLparams($url);

        for ($i = 0; $i < sizeof(self::$route_registry); $i++) {
            
            if ($url == self::$route_registry[$i]['name']) {

                $controller_ref = self::$route_registry[$i]['controller'];
                
                $method_ref = self::$route_registry[$i]['controller_method'];
                
                $controller = new $controller_ref;
                
                self::$route_registry[$i]['http_method'] == 'GET' ?
                
                $controller->$method_ref() : 
                
                $controller->$method_ref($_POST);
                
                $action_trigger = true;
                
                exit;
                
            }
        }
        
        if ($action_trigger == false) {
            
            throw new Exception('Route not registered: '.$url);
            
        }
    }
    
    
    public static function get($url, $action) {
      
        $route_spec['name'] = $url;
        
        $route_spec['http_method'] = 'GET';
            
        $action_parts = explode('@', $action);
        
        $route_spec['controller'] = $action_parts[0];
        
        $route_spec['controller_method'] = $action_parts[1];          
 
        self::$route_registry[] = $route_spec;
           
    }
    

    public static function post($url, $action) {
        
        $route_spec['name'] = $url;
        
        $route_spec['http_method'] = 'POST';
        
        $action_parts = explode('@', $action);
        
        $route_spec['controller'] = $action_parts[0];
        
        $route_spec['controller_method'] = $action_parts[1];
        
        self::$route_registry[] = $route_spec;
        
    }
    
    

    private function __resolveURLparams($url) {
        
        if(isset($url) && $url != '') {
            
            $url_parts = explode('/', $url);    
            
            $parametrized = false;
            
            $parameter = null;
            
            if (sizeof($url_parts) > 1) {
            
                foreach (self::$route_registry as $route_key => $route_val) {
                    
                    $route_name_parts = explode('/', $route_val['name']);
                    
                    if(sizeof($route_name_parts) == sizeof($url_parts)) {
                        
                        if (self::__routeArrayCompare($route_name_parts, $url_parts)) {
                            
                            if (isset($route_name_parts[sizeof($url_parts) -1])
                                && substr($route_name_parts[sizeof($url_parts) -1], 0, 1) == ':') {
                                                                                                    
                                     $parametrized = true;
                                     
                                     $parameter = $url_parts[sizeof($url_parts) -1];
                                     
                                     $controller_ref = $route_val['controller'];
                                     
                                     $method_ref = $route_val['controller_method'];
                                     
                                     $controller = new $controller_ref;
                                     
                                     $route_val['http_method'] == 'GET' ?
                                     
                                     $controller->$method_ref($parameter) :
                                     
                                     $controller->$method_ref($_POST, $parameter);
                                     
                                     $action_trigger = true;
                                     
                                     exit;
                                    
                            }
                            
                        }
                        
                    }
                         
                }
                
            } 
            
        }
    }
    
    
    private function __routeArrayCompare($registered_route, $requested_route) : bool {
        
        $validity_passed = 0;
                
        for ($i = 0; $i < sizeof($requested_route) -1; $i++) {
            
            if ($requested_route[$i] == $registered_route[$i]) {
                
                $validity_passed++;
                                
            }
            
        }
        
        if ($validity_passed == sizeof($registered_route) -1) {
                       
            return true;
            
        } else {
            
            return false;
            
        }
        
    }

}  