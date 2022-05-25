<?php
namespace core;

class App
{
    public AppBuilder $builder;
    public function __construct()
    {
        $this->runAutoloader();
        $this->builder = new AppBuilder();
    }

    private function runAutoloader()
    {
        spl_autoload_register(function ($className) {
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
            if (file_exists($file)) {
                require_once $file;
                return true;
            }
            return false;
        });

    }

    /**
     * @throws \Exception
     */
    public function run()
    {
        $url = $_SERVER['REQUEST_URI'] ?? '';
        Router::handleURLRequest($url, $this->builder->serviceContainer);
    }

    public function addService()
    {
//        $this->builder->serviceContainer->setService();
    }

}


