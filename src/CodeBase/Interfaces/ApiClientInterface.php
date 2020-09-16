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
     * @return string|null
     */
    public function getToken(): ?string;

    /**
     * @param array $options
     * @param $method
     * @param string $uriAppend
     * @param array $queryParams
     * @param array $callbacks
     * @return mixed
     */
    public function request(array $options, $method, string $uriAppend, array $queryParams, $callbacks = []);
}
