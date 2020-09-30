<?php


namespace ItlabStudio\ApiClient\CodeBase\Interfaces;

/**
 * Interface ApiClientInterface
 *
 * @package ItlabStudio\ApiClient\CodeBase\Interfaces
 */
interface ApiClientInterface
{

    /**
     * @param RequestBuilderInterface $requestBuilder
     *
     * @return mixed
     */
//    public function makeRequest(array $options, $method, string $uriAppend, array $queryParams, $callbacks = []);
    public function makeRequest(RequestBuilderInterface $requestBuilder);
}
