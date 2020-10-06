<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;
use ItlabStudio\ApiClient\CodeBase\Builders\HttpRequestBuilder;
use ItlabStudio\ApiClient\CodeBase\Interfaces\RequestBuilderInterface;

/**
 * Class AbstractApiResource
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources
 */
class AbstractApiResource implements ApiResourceInterface
{
    public static $TYPE_PRIVATE = 'private';
    public static $TYPE_PUBLIC  = 'public';

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
     * @param RequestBuilderInterface $requestBuilder
     *
     * @return mixed
     */
    protected function makeRequest(RequestBuilderInterface $requestBuilder)
    {
        $this->client->setResolvedResource($this);

        return $this->client->makeRequest(
            $requestBuilder
                ->withQueryParams($this->filters)
                ->withCallbacks($this->callbacks)
        );
    }

    /**
     * @param array $options
     *
     * @return HttpRequestBuilder
     */
    protected function request(array $options = [])
    {
        return new HttpRequestBuilder();
    }
}
