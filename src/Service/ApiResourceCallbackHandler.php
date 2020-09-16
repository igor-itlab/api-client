<?php


namespace ItlabStudio\ApiClient\Service;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\CallbackHandlerInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\CallbackObserverInterface;

/**
 * Class ApiResourceCallbackHandler
 * @package ItlabStudio\ApiClient\Service
 */
class ApiResourceCallbackHandler implements CallbackHandlerInterface
{
    private $observers;

    /**
     * ApiResourceCallbackHandler constructor.
     * @param iterable $observers
     */
    function __construct(iterable $observers)
    {
        $this->observers = $observers;
    }

    /**
     * @param CallbackObserverInterface $observer
     */
    function attach(CallbackObserverInterface $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * @param CallbackObserverInterface $observer
     */
    function detach(CallbackObserverInterface $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * @param ApiResourceInterface $apiResource
     * @param $response
     * @return mixed
     */
    function fire(ApiResourceInterface $apiResource, $response)
    {
        foreach ($this->observers as $obj) {
            $obj->fire($apiResource, $response);
        }

        return $response;
    }
}
