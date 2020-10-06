<?php

namespace ItlabStudio\ApiClient\Events;

use Symfony\Contracts\EventDispatcher\Event;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;

class RequestSuccessfulEvent extends Event
{
    protected $apiResource;
    protected $response;

    public function __construct(ApiResourceInterface $apiResource, $response)
    {
        $this->apiResource = $apiResource;
        $this->response    = $response;
    }

    public function getApiResource()
    {
        return $this->apiResource;
    }

    public function getResponse()
    {
        return $this->response;
    }
}