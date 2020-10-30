<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResourceInjectorInterface;
use ItlabStudio\ApiClient\CodeBase\Response\ApiResponse;

/**
 * Class AbstractResourceInjector
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources
 */
abstract class AbstractResourceInjector implements ResourceInjectorInterface
{
    /**
     * Define class
     *
     * @var string
     */
    public string $responseClass = ApiResponse::class;
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
