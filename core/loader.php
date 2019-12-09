<?php
// DEFINE LOADING STRUCTURE OF FUNCTIONS CONNECTING CORE, CONFIG, AOO DOMAINS
//namespace core;
//use core\Request;

require_once('./config/config.php');
require_once('./app/lib/helpers/helper_functions.php');

function class_autoloader($class_name) {
    if (file_exists('./core/'.$class_name.'.php')) {
        require_once('./core/'.$class_name.'.php');
    } elseif (file_exists('./app/controllers/'.$class_name.'.php')) {
        require_once('./app/controllers/'.$class_name.'.php');
    } elseif (file_exists('./app/'.$class_name.'.php')) {
        require_once('./app/'.$class_name.'.php');
    } elseif (file_exists('./core/lib/'.$class_name.'.php')) {
        require_once('./core/lib/interfaces/'.$class_name.'.php');
    }
//     elseif ($class_name.'.php') {
//         require_once($class_name.'.php');
//     }
}

/*
function autoloader($class_name) {
    $class_array = explode('\\', $class_name);
    //ddie($class_array);
    $class = array_pop($class_array);
    $sub_path = strtolower(implode('/', $class_array)); // ==> optional autloading of namespaces to be implemented later
    $path = './'. $sub_path. '/'. $class. '.php';
    ddie($path);
    if (file_exists($path)) {
        require_once($path);
    } else {

    }
}
*/

spl_autoload_register('class_autoloader');

