<?php

namespace core;
class AppBuilder
{
    public ServiceContainer $serviceContainer;

    public function __construct()
    {
        $this->serviceContainer = new ServiceContainer();
        require_once('routing/routes.php');
    }


}