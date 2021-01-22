<?php

namespace ItlabStudio\ApiClient\CodeBase\Builders;

use ItlabStudio\ApiClient\CodeBase\Interfaces\RequestBuilderInterface;
use Symfony\Component\HttpClient\HttpClient;

/**
 * Class RequestBuilder
 */
class RequestBuilder implements RequestBuilderInterface
{
    public static $METHOD_GET    = 'GET';
    public static $METHOD_POST   = 'POST';
    public static $METHOD_DELETE = 'DELETE';
    public static $METHOD_PUT    = 'PUT';

    /**
     * @var HttpClient
     */
    protected $request = HttpClient::class;

    /**
     * @var string
     */
    protected $method = 'GET';

    /**
     * @var string
     */
    protected $schema = 'https';
    /**
     * @var array
     */
    protected $headers = ['Content-Type' => 'application/json'];

    /**
     * @var array
     */
    protected $queryParams = [];

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var string
     */
    protected $uri;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $port = '';

    /**
     * @var string
     */
    protected $body;
    /**
     * @var string
     */
    protected $domain;
    /**
     * @var array
     */
    protected $callbacks = [];

    /**
     * @param string $schema
     */
    public function withSchema(string $schema)
    {
        $this->schema = $schema;

        return $this;
    }

    /**
     * @param string $schema
     */
    public function withDomain(string $domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * @param string $port
     */
    public function withPort(string $port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @param string $url
     */
    public function withUrl(string $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param string $method
     */
    public function withMethod(string $method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @param $header
     * @param $value
     */
    public function withHeader($header, $value)
    {
        $this->headers = array_merge($this->headers, [$header => $value]);

        return $this;
    }

    /**
     * @param array $headers
     */
    public function withHeaders($headers = [])
    {
        $this->headers = array_merge($this->headers, $headers);

        return $this;
    }

    /**
     * @param array $options
     */
    public function withOptions($options = [])
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @param $queryParam
     * @param $value
     *
     * @return $this
     */
    public function withQueryParam($queryParam, $value)
    {
        $this->queryParams = array_merge($this->queryParams, [$queryParam => $value]);

        return $this;
    }

    /**
     * @param array $queryParams
     */
    public function withQueryParams($queryParams = [])
    {
        $this->queryParams = $queryParams;

        return $this;
    }

    /**
     * @param $body
     */
    public function withBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param $body
     */
    public function withCallbacks($callbacks = [])
    {
        $this->callbacks = $callbacks;

        return $this;
    }

    /**
     * @return \Symfony\Contracts\HttpClient\HttpClientInterface
     */
    public function makeRequest(): \Symfony\Contracts\HttpClient\HttpClientInterface
    {
        $this->makeUri()->makeHeaders()->makeBody();

        return $this->request::create($this->options);
    }

    /**
     * @return $this
     */
    protected function makeBody()
    {
        $this->options['body'] = $this->body;

        return $this;
    }

    /**
     * @return $this
     */
    protected function makeHeaders()
    {
        $this->options['headers'] = $this->headers;

        return $this;
    }

    /**
     * @return $this
     */
    protected function makeUri()
    {
        $params = http_build_query($this->queryParams);

        $this->uri = sprintf('%1$s://%2$s', $this->schema, $this->domain)
            . ($this->port ? ':' . $this->port : '')
            . '/' . $this->url . ($params ? '?' . $params : '');

        return $this;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return array
     */
    public function getCallbacks(): array
    {
        return $this->callbacks;
    }
}
