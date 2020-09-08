<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;

/**
 * Class AbstractApiResource
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources
 */
class AbstractApiResource implements ApiResourceInterface
{
    /** @var bool */
    protected $authorizationRequire = false;

    /** @var string */
    protected $apiDomainName;

    /** @var string */
    protected $uri;

    /** @var string */
    protected $uriPreffix = 'api';

    /** @var string */
    protected $method = 'GET';

    /** @var callable $callback */
    protected $callback;
    /**
     * @var ApiClientInterface
     */
    protected $client;

    public function __construct(ApiClientInterface $client)
    {
        $this->client = $client;
        $this->client->setResolvedResource($this);
    }

    /**
     * @return string
     */
    public function getURI()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getApiDomainName()
    {
        return $this->apiDomainName;
    }

    public function getById(int $id)
    {
    }

    public function getAll()
    {
    }

    /**
     * @return string
     */
    public function getUriPreffix(): string
    {
        return $this->uriPreffix;
    }

    /**
     * @param array $options
     *
     * @return mixed
     */
    protected function request(array $options = [])
    {
        return $this->client->request(
            $options,
            $this->method,
            $this->getApiDomainName() . '/' . $this->getUriPreffix() . '/' . $this->getURI()
        );
    }
}
