<?php
declare(strict_types=1);

require_once('./core/loader.php');
require_once('./routing/routes.php');


$url = isset($_SERVER['PATH_INFO']) ?

       $_SERVER['PATH_INFO'] :

       (isset($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '');

$url_one = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';

Router::handleURLRequest($url);

?>
