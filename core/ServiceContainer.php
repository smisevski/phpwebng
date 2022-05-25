<?php
declare(strict_types=1);

namespace core;

use core\Psr\ContainerInterface;

use Exception;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionParameter;

class ServiceContainer implements ContainerInterface
{
    private array $entries = [];

    public function get(string $id)
    {
        if ($this->has($id)) {
            $entry = $this->entries[$id];
            return $entry($this);
        }
//        if ($id == "app\\services\\StudentService")
//        die(json_encode(['$entries' => $this->entries]));


        return $this->resolve($id);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function setService(string $id, callable $concrete): void
    {
        $this->entries[$id] = $concrete;
    }

    public function resolve(string $id)
    {
        $reflectionClass = new ReflectionClass($id);
        if ($id == "app\\services\\StudentService")
            die(json_encode(['$entries' => $this->entries]));
        if (!$reflectionClass->isInstantiable()) {
            throw new \ReflectionException('Class "' . $id . '" is not instantiable');
        }

        $constructor = $reflectionClass->getConstructor();


        if (!$constructor) {
            return new $id;
        }

        $parameters = $constructor->getParameters();

        if (!$parameters) {
            return new $id;
        }
        $dependencies = array_map(
            function (ReflectionParameter $param) use ($id) {
                $name = $param->getName();

                $type = $param->getType();

                if (!$type) {
                    throw new Exception(
                        'Failed to resolve class "' . $id . '" because param "' . $name . '" is missing a type hint'
                    );
                }

                if ($type instanceof \ReflectionNamedType && !$type->isBuiltin()) {
                    return $this->get($type->getName());
                }

                throw new Exception(
                    'Failed to resolve class "' . $id . '" because invalid param "' . $name . '"'
                );
            },
            $parameters
        );

        return $reflectionClass->newInstanceArgs($dependencies);
    }


    public function getMethodArgs(string $id, string $methodName): array
    {
        $reflectionClass = new ReflectionClass($id);
        $dependencies = [];
        if (!$reflectionClass) {
            throw new Exception('Class "' . $id . ' can\'t be found.');
        }

        $method = $reflectionClass->getMethod($methodName);

        $parameters = $method->getParameters();

        foreach ($parameters as $parameter) {

            if ($parameter->hasType()) {
                $dependenceClass = (string)$parameter->getType();
                $dependencies[] = new $dependenceClass();
            }

        }
        return $dependencies;
    }
}
