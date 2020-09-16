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
    public static $TYPE_PRIVATE = 'private';
    public static $TYPE_PUBLIC = 'public';

    public static $METHOD_GET = 'GET';
    public static $METHOD_POST = 'POST';

    /** @var string */
    protected $apiDomainName;

    /** @var string */
    protected $uri;

    /** @var string */
    protected $uriPrefix = 'api/';

    /** @var string */
    protected $method = 'GET';

    /** @var string */
    protected $type = 'private';

    /** @var callable $callback */
    protected $callback;

    /** @var ApiClientInterface */
    protected $client;

    /**
     * AbstractApiResource constructor.
     * @param ApiClientInterface $client
     */
    public function __construct(ApiClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
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

    /**
     * @param int $id
     */
    public function getById(int $id)
    {
    }

    public function getAll()
    {
    }

    /**
     * @return string
     */
    public function getUriPrefix(): string
    {
        return $this->uriPrefix;
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
            $this->getApiDomainName() . '/' . $this->getUriPrefix() . $this->getType() . '/' . $this->getURI()
        );
    }
}
