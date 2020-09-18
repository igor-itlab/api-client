<?php


namespace ItlabStudio\ApiClient\CodeBase\Callbacks;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;
use ItlabStudio\ApiClient\CodeBase\Exceptions\BadResponceException;

/**
 * Class SignatureCallback
 * @package ItlabStudio\ApiClient\CodeBase\Callbacks
 */
class SignatureCallback extends Observer
{
    /**
     * @param ApiResourceInterface $observable
     * @param $response
     * @return bool
     * @throws BadResponceException
     */
    function goal(ApiResourceInterface $observable, $response)
    {
        if (true) {
            return $response;
        } else {
            throw new BadResponceException('Signature does not match to the response body');
        }
    }
}
