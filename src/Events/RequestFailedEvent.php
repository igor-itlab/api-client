<?php

namespace ItlabStudio\ApiClient\Events;

use Exception;
use ItlabStudio\ApiClient\CodeBase\Interfaces\RequestBuilderInterface;
use Symfony\Contracts\EventDispatcher\Event;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;

class RequestFailedEvent extends Event
{
    public    $continue = true;
    protected $apiResource;
    protected $response;
    /**
     * @var RequestBuilderInterface
     */
    protected $requestBuilder;
    /**
     * @var Exception
     */
    protected $exception;

    /**
     * RequestFailedEvent constructor.
     *
     * @param ApiResourceInterface    $apiResource
     * @param RequestBuilderInterface $requestBuilder
     * @param null                    $response
     * @param Exception               $exception
     */
    public function __construct(
        ApiResourceInterface $apiResource,
        RequestBuilderInterface $requestBuilder,
        Exception $exception,
        $response = null
    ) {
        $this->apiResource    = $apiResource;
        $this->requestBuilder = $requestBuilder;
        $this->exception      = $exception;
        $this->response       = $response;
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
    public function getRequestBuilder()
    {
        return $this->requestBuilder;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return Exception
     */
    public function getException(): Exception
    {
        return $this->exception;
    }
}