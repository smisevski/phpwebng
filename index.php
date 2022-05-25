<?php
declare(strict_types=1);
//namespace main;
ini_set('display_errors', '1');
error_reporting(E_ERROR);
use core\App;
require_once('core/App.php');
$app = new App();

$app->builder->serviceContainer->setService(\app\services\StudentService::class, function ($containerInstance) {
    return new \app\services\StudentService();
});
$app->builder->serviceContainer->setService(\app\data\DbContext::class, function ($containerInstance) {
    return new \app\data\DbContext();
});
$app->run();

