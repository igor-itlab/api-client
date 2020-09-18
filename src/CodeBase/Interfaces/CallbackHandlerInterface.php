<?php


namespace ItlabStudio\ApiClient\CodeBase\Interfaces;

/**
 * Interface CallbackHandlerInterface
 * @package ItlabStudio\ApiClient\CodeBase\Interfaces
 */
interface CallbackHandlerInterface
{

//    /**
//     * Attach an CallbackObserverInterface
//     * @link https://php.net/manual/en/splsubject.attach.php
//     * @param CallbackObserverInterface $observer <p>
//     * The <b>SplObserver</b> to attach.
//     * </p>
//     * @return void
//     */
//    public function attach(CallbackObserverInterface $observer);
//
//    /**
//     * Detach an observer
//     * @link https://php.net/manual/en/splsubject.detach.php
//     * @param CallbackObserverInterface $observer <p>
//     * The <b>CallbackObserverInterface</b> to detach.
//     * </p>
//     * @return void
//     */
//    public function detach(CallbackObserverInterface $observer);

    /**
     * Notify an observer
     * @link https://php.net/manual/en/splsubject.notify.php
     * @param ApiResourceInterface $apiResource
     * @param $response
     * @return void
     */
    public function fire(ApiResourceInterface $apiResource, $response);

}
