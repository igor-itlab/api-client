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

    public function __construct(ApiClientInterface $client, $type)
    {
        $this->client = $client;
        $this->cache = new FilesystemAdapter('api_client_JWT_token');
        $this->client->setResolvedResource($this);
    }

    public function generateToken()
    {
        /** @var CacheItemInterface $tokenItem */
        $tokenItem = $this->cache->getItem(static::$API_CLIENT_TOKEN_NAME . $this->endpointType);

        if (!$tokenItem->isHit()) {
            $token = EncryptionManager::encodeSecretKey(
                $this->client->getClientId(),
                $this->client->getSecretKey(),
                $this->privateTokenExpires
            );
//            $tokenItem->expiresAfter($this->client->getTokenExpires());
            $tokenItem->expiresAfter($this->privateTokenExpires);
            $tokenItem->set($token);
            $this->cache->save($tokenItem);
        }

        $this->client->setToken($tokenItem->get());
        $this->client->setHeaders(
            [
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'JWS-AUTH-TOKEN ' . $tokenItem->get()
                ]
            ]
        );
    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function request(array $options = [])
    {
        /** @var CacheItemInterface $tokenItem */
        $tokenItem = $this->cache->getItem(static::$API_CLIENT_TOKEN_NAME . $this->endpointType);

        if (!$tokenItem->isHit()) {
//            $token = EncryptionManager::encodeSecretKey(
//                $this->client->getClientId(),
//                $this->client->getSecretKey(),
//                $this->publicTokenExpires
//            );

            /** @TODO  Make request for token */
            $token = $this->request();
//            $tokenItem->expiresAfter($this->client->getTokenExpires());
            $tokenItem->expiresAfter($this->publicTokenExpires);
            $tokenItem->set($token);
            $this->cache->save($tokenItem);
        }

        $this->client->setToken($tokenItem->get());
        $this->client->setHeaders(
            [
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $tokenItem->get()
                ]
            ]
        );
    }
}
