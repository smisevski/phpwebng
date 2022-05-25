<?php

namespace core;

use Exception;

class Router
{

    public static $route_registry = [];

    public function __construct()
    {

    }


    public static function handleURLRequest($url, $serviceContainer)
    {

        $url = substr($url, 1);

        self::resolveURLparams($url, $serviceContainer);
        for ($i = 0; $i < sizeof(self::$route_registry); $i++) {
            if ($url == self::$route_registry[$i]['name']) {

                $controller_ref = self::$route_registry[$i]['controller'];
                $method_ref = self::$route_registry[$i]['controller_method'];

                $controller = $serviceContainer->get($controller_ref);

                $methodArgs = !empty($serviceContainer->getMethodArgs($controller_ref, $method_ref)) ?
                    $serviceContainer->getMethodArgs($controller_ref, $method_ref) : [];
                if (method_exists($controller, $method_ref)) {
                    return call_user_func_array([$controller, $method_ref], $methodArgs);
                }
                exit;

            }
        }

    }


    public static function get($url, $controller, $method)
    {

        $route_spec['name'] = $url;

        $route_spec['http_method'] = 'GET';

        $route_spec['controller'] = $controller;

        $route_spec['controller_method'] = $method;

        self::$route_registry[] = $route_spec;

    }


    public static function post($url, $controller, $method)
    {

        $route_spec['name'] = $url;

        $route_spec['http_method'] = 'POST';

        $route_spec['controller'] = $controller;

        $route_spec['controller_method'] = $method;

        self::$route_registry[] = $route_spec;

    }


    private function resolveURLparams($url, $serviceContainer)
    {

        if (isset($url) && $url != '') {

            $url_parts = explode('/', $url);

            if (sizeof($url_parts) > 1) {

                foreach (self::$route_registry as $route_key => $route_val) {

                    $route_name_parts = explode('/', $route_val['name']);
                    if (sizeof($route_name_parts) == sizeof($url_parts)) {

                        if (self::routeArrayCompare($route_name_parts, $url_parts)) {


                            if (isset($route_name_parts[sizeof($url_parts) - 1])
                                && substr($route_name_parts[sizeof($url_parts) - 1], 0, 1) == ':') {


                                // ^^ ovoj del mora da se refaktorira so array_ f-iite
                                $parameter = $url_parts[sizeof($url_parts) - 1];

                                $controller_ref = $route_val['controller'];

                                $method_ref = $route_val['controller_method'];
//                                die(json_encode(['$parameter' => $parameter]));

                                $controller = $serviceContainer->get($controller_ref);
                                $methodArgs = !empty($serviceContainer->getMethodArgs($controller_ref, $method_ref)) ?
                                    $serviceContainer->getMethodArgs($controller_ref, $method_ref) : [];
                                $methodArgs[] = $parameter;

                                if (method_exists($controller, $method_ref)) {
                                    return call_user_func_array([$controller, $method_ref], $methodArgs);
                                }
                                exit;


                            }

                        }

                    }

                }

            }

        }
    }


    private function routeArrayCompare($registered_route, $requested_route): bool
    {

        $validity_passed = 0;

        for ($i = 0; $i < sizeof($requested_route) - 1; $i++) {

            if ($requested_route[$i] == $registered_route[$i]) {

                $validity_passed++;

            }

        }

        if ($validity_passed == sizeof($registered_route) - 1) {

            return true;

        } else {

            return false;

        }

    }
}  