<?php


namespace ItlabStudio\ApiClient\CodeBase\Interfaces;


interface CallbackObserverInterface
{
    /**
     * Receive update from subject
     * @link https://php.net/manual/en/splobserver.update.php
     * @param ApiResourceInterface $subject <p>
     * The <b>SplSubject</b> notifying the observer of an update.
     * </p>
     * @param $response
     * @return void
     */
    public function fire(ApiResourceInterface $subject, $response);

}
