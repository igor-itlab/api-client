<?php


namespace ItlabStudio\ApiClient\CodeBase\Interfaces;

use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Interface RequestBuilderInterface
 *
 * @package ItlabStudio\ApiClient\CodeBase\Interfaces
 */
interface HttpRequestBuilderInterface
{

    public function withSchema(string $schema);

    public function withDomain(string $url);

    public function withUrl(string $url);

    public function withPort(string $port);

    public function withMethod(string $method);

    public function withHeader($header, $value);

    public function withHeaders($headers = []);

    public function withOptions($options = []);

    public function withQueryParams($params = []);

    public function withBody($body);

}
