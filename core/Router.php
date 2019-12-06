<?php
//use core\lib\interfaces\StringResolveHelper;

class Router  
{
    private $method;
    
    private $data;
    
    public static $route_registry = [];
        
    public function __construct(){
        //
    }
    
    
    public static function handleURLRequest($url) {
        
        $url = substr($url, 1);
        
        $action_trigger = false;

       
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
            
            $return_params = [];
            
            ddie($url_parts);
            
            if (sizeof($url_parts) > 1) {
                // do the parameters handling options. send to action
                //
                for ($i = 0; $i < sizeof($url_parts); $i++) {
                    
                    $return_params[$$url_parts[$i]] = $url_parts[$i];
                    
                }
                
                ddie($return_params);
                
            } else {
                
            }
            
        }
    }

}  