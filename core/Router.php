<?php
//namespace core;
use core\lib\interfaces\StringResolveHelper;

class Router {
    private $method;
    private $data;
    public  $route_registry = array();
    public function __construct(){
        //$this->method = $_SERVER['REQUEST_METHOD'];
    }
    public static function get($url, $action) {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $action_parts = explode('@', $action);
            $controller_ref = $action_parts[0];
            $method_ref = $action_parts[1];
            $controller = new $controller_ref;
            $controller->$method_ref();
        }
    }

    public static function post($url, $action) {
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $action_parts = explode('@', $action);
             $controller_ref = $action_parts[0];
             $method_ref = $action_parts[1];
             $controller = new $controller_ref;
             $controller->$method_ref($_POST);
         } 
    }

    private function resolveURLparams($url) {
        if(isset($url) && $url != '') {
            $url_parts = explode('/', $url);
            
            if (count($url_parts) > 1) {
                
            }
            
//            if(isset($url_parts[1]) && is_numeric($url_parts[1])) {
//                $param_index_numeric = (integer) $url_parts[1];
//            }
        }
    }

}  