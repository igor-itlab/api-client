<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    public static $TYPE_PUBLIC  = 'public';

    public static $METHOD_GET  = 'GET';
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

    /** @var array $callbacks */
    protected $callbacks = [];

    /** @var ApiClientInterface */
    protected $client;

    /** @var array */
    protected $filters = [];

    /**
     * AbstractApiResource constructor.
     *
     * @param ApiClientInterface $client
     */
    public function __construct(ApiClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param $key
     * @param $value
     *
     * @return $this
     */
    public function setFilter($key, $value)
    {
        $this->filters[$key] = $value;

        return $this;
    }

    /**
     * @param array $filters
     *
     * @return $this
     */
    public function setFilters(array $filters = [])
    {
        $this->filters = array_merge($this->filters, $filters);

        return $this;
    }

    /**
     * @return $this
     */
    public function resetFilters()
    {
        $this->filters = [];

        return $this;
    }

    /**
     * @param array $callbacks
     *
     * @return $this
     */
    public function pushCallbacks(array $callbacks)
    {
        $this->callbacks = array_merge($this->callbacks, $callbacks);

        return $this;
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
     * @param array $options
     *
     * @param array $callbacks
     *
     * @return mixed
     */
    protected function request(array $options = [])
    {
        return $this->client->request(
            $options,
            $this->method,
            $this->getApiDomainName() . '/' . $this->getUriPrefix() . $this->getType() . '/' . $this->getURI(),
            $this->filters,
            $this->callbacks
        );
    }

    /**
     * @return mixed
     */
    public function getApiDomainName()
    {
        return $this->apiDomainName;
    }

    /**
     * @return string
     */
    public function getUriPrefix(): string
    {
        return $this->uriPrefix;
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
}
