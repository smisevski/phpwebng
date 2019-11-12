<?php


require_once('./core/loader.php');
require_once('./routing/routes.php');

//session_start();

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];

$url_one = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
//ini_set('display_errors', 1);
//
//error_reporting(E_ALL);

// Router::test($url_one);
// Router::post($url_one);
?>

<html>
<head>
    <title>TEST</title>
</head>
<body>
<div>
    <hr>
    <form method="post" action="post_test">
        <label>POST METHOD ROUTER TEST</label><br>
        <input type="text" name="field"><br>
        <input type="submit" value="Submit Action">
    </form>
    <form method="get" action="test">
    <label>GET METHOD ROUTER TEST</label><br>
    <input type="submit" value="GET Action">
    </form>
</div>
</body>
</html>
