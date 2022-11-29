<?php
declare(strict_types=1);

ini_set('display_errors', '1');

error_reporting(E_ALL);

try {
    require_once 'core/App.php';

} catch (\Exception $th) {
    echo $th->getCode() . ':' . $th->getMessage();
}

use core\App;

$app = new App();

    $app->builder->serviceContainer->setService(\app\data\DbContext::class, function ($containerInstance) {
        return new \app\data\DbContext();
    });
// echo 'da';


// $app->builder->serviceContainer->setService(\app\services\StudentService::class, function ($containerInstance) {
//     return new \app\services\StudentService($containerInstance);
// });

// $app->builder->serviceContainer->setService(\app\data\DbContext::class, function ($containerInstance) {
//     return new \app\data\DbContext();
// });

$app->run();

