<?php

return [
    'appConfig' => [
        'appName' => 'phpwebng',
        'version' => '0.1.0',
        'hostName' => 'localhost',
        'authorName' => 'smisevski',
        'authorEmail' => 'saso_misevski@yahoo.com',
        'title' => 'PHPWEBNG',
        'description' => 'Light PHP application development framework'
    ],
    'connectionParametersMysql' => [
        'dataSourceName' => 'mysql:host=127.0.0.1;dbname=phpwebng',
        'user' => 'phpwebng',
        'password' => 'phpwebng',
        'driver' => 'pdo_mysql',
    ],
    'secretKey' => 'secretKey'
];