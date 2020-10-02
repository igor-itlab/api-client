<?php

namespace ItlabStudio\ApiClient\Events;

use ItlabStudio\ApiClient\CodeBase\Interfaces\RequestBuilderInterface;
use Symfony\Contracts\EventDispatcher\Event;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;

class RequestFailedEvent extends Event
{
    protected $apiResource;
    protected $response;

    /**
     * RequestFailedEvent constructor.
     *
     * @param ApiResourceInterface $apiResource
     * @param                      $response
     */
    public function __construct(ApiResourceInterface $apiResource, $response)
    {
        $this->apiResource = $apiResource;
        $this->response    = $response;
    }

    /**
     * @return ApiResourceInterface
     */
    public function getApiResource()
    {
        return $this->apiResource;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }
}