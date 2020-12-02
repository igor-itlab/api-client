<?php


namespace ItlabStudio\ApiClient\CodeBase\Interfaces;

/**
 * Interface ApiAuthorizationInterface
 *
 * @package ItlabStudio\ApiClient\CodeBase\Interfaces
 */
interface ApiAuthorizationInterface
{

    function auth($type);

    function getSignature($requestString, $projectKey);

}
