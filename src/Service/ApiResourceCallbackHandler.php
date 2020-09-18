<?php


namespace ItlabStudio\ApiClient\Service;


use ItlabStudio\ApiClient\CodeBase\Callbacks\ClosureCallbackObserver;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\CallbackHandlerInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\CallbackObserverInterface;

/**
 * Class ApiResourceCallbackHandler
 *
 * @package ItlabStudio\ApiClient\Service
 */
class ApiResourceCallbackHandler implements CallbackHandlerInterface
{
    /**
     * @var iterable
     */
    private $observers;

    /**
     * @var
     */
    private $customObservers;


    /**
     * ApiResourceCallbackHandler constructor.
     *
     * @param iterable $observers
     */
    function __construct(iterable $observers = [])
    {
        $this->observers = $observers;
    }

//    /**
//     * @param CallbackObserverInterface $observer
//     */
//    function attach(CallbackObserverInterface $observer)
//    {
//        $this->observers->attach($observer);
//    }
//
//    /**
//     * @param CallbackObserverInterface $observer
//     */
//    function detach(CallbackObserverInterface $observer)
//    {
//        $this->observers->detach($observer);
//    }

    /**
     * @param ApiResourceInterface $apiResource
     * @param                      $response
     *
     * @return mixed
     */
    function fire(ApiResourceInterface $apiResource, $response)
    {
        foreach ($this->observers as $obj) {
            $response = $obj->fire($apiResource, $response);
        }

        if ($this->customObservers) {
            $response = (new static($this->customObservers))->fire($apiResource, $response);
        }
        
        $this->clearCustom();

        return $response;
    }

    /**
     * @param iterable $observers
     */
    function setCustom(iterable $observers)
    {
        foreach ($observers as $observer) {
            if (is_callable($observer)) {
                $this->customObservers[] = new ClosureCallbackObserver($observer);
                continue;
            }
            $this->customObservers[] = $observer;
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function clearCustom()
    {
        $this->customObservers = [];

        return $this;
    }
}
