<?php


namespace ItlabStudio\ApiClient\CodeBase;


use App\Utils\EncryptionManager;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use Psr\Cache\CacheItemInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

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

    public function __construct(ApiClientInterface $client)
    {
        $this->client = $client;
        $this->cache = new FilesystemAdapter('api_client_JWT_token');
        $this->client->setResolvedResource($this);
    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function request(array $options = [])
    {
        /** @var CacheItemInterface $tokenItem */
        $tokenItem = $this->cache->getItem(static::$API_CLIENT_TOKEN_NAME);

        if (!$tokenItem->isHit()) {
            $token = EncryptionManager::encodeSecretKey(
                $this->client->getClientId(),
                $this->client->getSecretKey(),
                $this->client->getTokenExpires()
            );
            $tokenItem->expiresAfter($this->client->getTokenExpires());
            $tokenItem->set($token);
            $this->cache->save($tokenItem);
        }

        $this->client->setToken($tokenItem->get());
    }
}
