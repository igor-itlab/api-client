<?php


namespace ItlabStudio\ApiClient\CodeBase\Interfaces;

/**
 * Interface ApiClientInterface
 *
 * @package ItlabStudio\ApiClient\CodeBase\Interfaces
 */
interface ApiClientInterface
{
    public function getToken(): ?string;

    public function request(array $options, $method, string $uriAppend, array $queryParams);
}
