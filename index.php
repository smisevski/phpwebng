<?php
declare(strict_types=1);

ini_set('display_errors', '1');

error_reporting(E_ALL);

try {
    require_once('core/App.php');
} catch (\Exception $e) {
    echo "{$e->getCode()} : {$e->getMessage()}";
}

use core\App;

$app = new App();

$app->builder->serviceContainer->setService(\app\data\DbContext::class, function ($containerInstance) {
    return new \app\data\DbContext();
});

$app->builder->serviceContainer->setService(\app\data\DbContext::class, function ($containerInstance) {
    return new \app\data\DbContext();
});

$app->run();
