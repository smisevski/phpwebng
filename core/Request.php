<?php
namespace core;

use core\lib\interfaces\StringResolveHelper;

class Request implements StringResolveHelper {
    public $fields;
    
    function __construct() {
        $var = 'daa';
        print_r($var);
        
    }

    public function resolveURLparams() {
        ;
    }

    public static function displayReq() {
        print_r($_SERVER['REQUEST_METHOD']);
    }
    
    
}