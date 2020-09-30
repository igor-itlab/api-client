<?php


namespace ItlabStudio\ApiClient\CodeBase\Callbacks;


use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\ApiResource;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;
use ItlabStudio\ApiClient\CodeBase\Exceptions\BadResponceException;

/**
 * Class SignatureCallback
 *
 * @package ItlabStudio\ApiClient\CodeBase\Callbacks
 */
class SignatureCallback extends Observer
{
    /**
     * @param ApiResourceInterface $observable
     * @param                      $response
     *
     * @return bool
     * @throws BadResponceException
     */
    function goal(ApiResourceInterface $observable, $response)
    {
        if ($observable instanceof ApiResource) {
            return $response->toArray();
        } elseif ($observable instanceof ApiResourceInterface) {
            return $response;
        } else {
            throw new BadResponceException('Signature does not match to the response body');
        }
    }
}
