<?php


namespace ItlabStudio\ApiClient\CodeBase;


use App\Utils\EncryptionManager;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use Psr\Cache\CacheItemInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

/**
 * Class AbstractAuth
 *
 * @package ItlabStudio\ApiClient\CodeBase
 */
abstract class AbstractAuth
{
    /**
     * @var ApiClientInterface
     */
    protected $client;
    /**
     * @var FilesystemAdapter
     */
    protected $cache;

    /** @var string */
    protected $endpointType;

    /**
     * @var mixed
     */
    protected $privateTokenExpires;
    /**
     * @var mixed
     */
    protected $publicTokenExpires;

    /** @var string */
    protected $apiDomainName;

    /**
     * AbstractAuth constructor.
     *
     * @param ApiClientInterface $client
     * @param                    $type
     */
    public function __construct(ApiClientInterface $client, $type)
    {
        $this->type = $type;
        $this->client = $client;
        $this->cache = new FilesystemAdapter('api_client_token_cache');
    }

    abstract protected function generateToken();

    abstract public function doAuth();

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @return mixed
     */
    public function getSecretKey()
    {
        return $this->secretKey;
    }

    /**
     * @return mixed
     */
    public function getPrivateTokenExpires()
    {
        return $this->privateTokenExpires;
    }

    /**
     * @return mixed
     */
    public function getPublicTokenExpires()
    {
        return $this->publicTokenExpires;
    }
}
