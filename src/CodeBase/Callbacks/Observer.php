<?php


namespace ItlabStudio\ApiClient\CodeBase\Callbacks;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\CallbackHandlerInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\CallbackObserverInterface;

/**
 * Class Observer
 * @package ItlabStudio\ApiClient\CodeBase\Callbacks
 */
abstract class Observer implements CallbackObserverInterface
{
    private $observable;

    /**
     * @param ApiResourceInterface $subject
     * @param $response
     */
    function fire(ApiResourceInterface $subject, $response)
    {
//        if ($subject === $this->observable) {
            $this->goal($subject, $response);
//        }
    }

    abstract function goal(ApiResourceInterface $observable, $response);
}
