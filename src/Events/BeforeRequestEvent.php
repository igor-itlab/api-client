<?php

namespace ItlabStudio\ApiClient\Events;

use ItlabStudio\ApiClient\CodeBase\Interfaces\RequestBuilderInterface;
use Symfony\Contracts\EventDispatcher\Event;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;

/**
 * Class BeforeRequestEvent
 *
 * @package ItlabStudio\ApiClient\CodeBase\Events
 */
class BeforeRequestEvent extends Event
{
    public    $continue = true;
    protected $apiResource;
    protected $requestBuilder;

    /**
     * BeforeRequestEvent constructor.
     *
     * @param ApiResourceInterface    $apiResource
     * @param RequestBuilderInterface $requestBuilder
     */
    public function __construct(ApiResourceInterface $apiResource, RequestBuilderInterface $requestBuilder)
    {
        $this->apiResource    = $apiResource;
        $this->requestBuilder = $requestBuilder;
    }

    /**
     * @return ApiResourceInterface
     */
    public function getApiResource()
    {
        return $this->apiResource;
    }

    /**
     * @return RequestBuilderInterface
     */
    public function getRequestBuilder()
    {
        return $this->requestBuilder;
    }

    /**
     * @param RequestBuilderInterface $requestBuilder
     */
    public function setRequestBuilder(RequestBuilderInterface $requestBuilder): void
    {
        $this->requestBuilder = $requestBuilder;
    }
}