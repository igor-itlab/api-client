<?php


namespace ItlabStudio\ApiClient\CodeBase\Callbacks;

use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;

/**
 * Class CustomCallbackObserver
 *
 * @package ItlabStudio\ApiClient\CodeBase\Callbacks
 */
class ClosureCallbackObserver extends Observer
{
    /**
     * CustomCallbackObserver constructor.
     *
     * @param $closure
     */
    public function __construct($closure)
    {
        $this->closure = $closure;
    }

    /**
     * @param ApiResourceInterface $observable
     * @param                      $response
     *
     * @return bool
     * @throws BadResponceException
     */
    function goal(ApiResourceInterface $observable, $response)
    {
        $this->apiResource = $observable;
        $this->response    = $response;

        $closure = $this->closure->bindTo($this);

        return $closure();
    }

    /**
     * @return mixed
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