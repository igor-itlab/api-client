<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResourceInjectorInterface;

abstract class AbstractResourceInjector implements ResourceInjectorInterface
{
    /**
     * @var ApiClientInterface
     */
    protected $client;

    /**
     * @param $method
     *
     * @return bool
     */
    public function supports($method)
    {
        return method_exists($this, $method);
    }

}