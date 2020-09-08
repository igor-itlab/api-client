<?php

namespace ItlabStudio\ApiClient\CodeBase;

use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Auth;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\CryptoCurrencies;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\FiatCurrencies;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResourceInjectorInterface;
use Symfony\Component\DependencyInjection\Container;

/**
 * Class ResourceInjector
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources
 */
class ResourceInjector implements ResourceInjectorInterface
{

    /**
     * @var ApiClientInterface
     */
    protected $client;

    protected $handler;
    /**
     * @var Container
     */
    protected $container;

    public function __construct(ApiClientInterface $client, Container $container)
    {
        $this->client = $client;
        $this->container = $container;
    }

    /**
     * @param $method
     *
     * @return bool
     */
    public function supports($method)
    {
        return method_exists($this, $method);
    }

    /** @return Auth */
    public function CPAuth()
    {
        /** @var Auth */
        return new Auth($this->client);
    }

    /**
     * @return CryptoCurrencies
     */
    public function cryptoCurrencies()
    {
        /** @var CryptoCurrencies */
        return new CryptoCurrencies($this->client);
    }

    /**
     * @return FiatCurrencies
     */
    public function fiatCurrencies()
    {
        /** @var FiatCurrencies */
        return new FiatCurrencies($this->client);
    }

}
