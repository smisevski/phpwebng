<?php
// DEFINE LOADING STRUCTURE OF FUNCTIONS CONNECTING CORE, CONFIG, AOO DOMAINS
//namespace core;

require_once('./config/config.php');
require_once('./app/lib/helpers/helper_functions.php');

function class_autoloader($class_name) {
    if (count(explode('\\', $class_name)) > 1)  $class_name_ns = str_replace('\\', '/', $class_name);
        else $class_name_ns = $class_name;

    if (file_exists('./core/'.$class_name.'.php')) {
        require_once('./core/'.$class_name.'.php');
    } elseif (file_exists($class_name.'.php')) {
        require_once($class_name.'.php');
    } elseif (file_exists('./app/controllers/'.$class_name.'.php')) {
        require_once('./app/controllers/'.$class_name.'.php');
    } elseif (file_exists('./app/'.$class_name.'.php')) {
        require_once('./app/'.$class_name.'.php');
    } elseif (file_exists('./core/lib/'.$class_name.'.php')) {
        require_once('./core/lib/interfaces/'.$class_name.'.php');
    }

}

spl_autoload_register('class_autoloader');
