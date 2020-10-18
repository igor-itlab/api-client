<?php

namespace ItlabStudio\ApiClient\Events;

use ItlabStudio\ApiClient\CodeBase\Interfaces\RequestBuilderInterface;
use Symfony\Contracts\EventDispatcher\Event;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;

class AfterMappingEvent extends Event
{
    public    $continue = true;
    protected $apiResource;
    protected $requestBuilder;
    protected $response;

    public function __construct(ApiResourceInterface $apiResource, RequestBuilderInterface $requestBuilder, $response)
    {
        $this->apiResource    = $apiResource;
        $this->requestBuilder = $requestBuilder;
        $this->response       = $response;
    }

    public function getApiResource()
    {
        return $this->apiResource;
    }

    public function getRequestBuilder()
    {
        return $this->requestBuilder;
    }

    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response): void
    {
        $this->response = $response;
    }

}