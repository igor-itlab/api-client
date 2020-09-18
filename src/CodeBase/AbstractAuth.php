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
        $this->type   = $type;
        $this->client = $client;
        $this->cache  = new FilesystemAdapter('api_client_JWT_token');
    }

    public function generateToken()
    {
        /** @var CacheItemInterface $tokenItem */
        $tokenItem = $this->cache->getItem(static::$API_CLIENT_TOKEN_NAME . $this->endpointType);

        if (!$tokenItem->isHit()) {
            $token = EncryptionManager::encodeSecretKey(
                $this->getClientId(),
                $this->getSecretKey(),
                $this->getPrivateTokenExpires()
            );
            $tokenItem->expiresAfter($this->getPrivateTokenExpires());
            $tokenItem->set($token);
            $this->cache->save($tokenItem);
        }

        $this->client->setHeaders(
            [
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'JWS-AUTH-TOKEN ' . $tokenItem->get(),
                ],
            ]
        );
    }

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
            $tokenItem->expiresAfter($this->getPublicTokenExpires());
            $tokenItem->set($token);
            $this->cache->save($tokenItem);
        }

        $this->client->setHeaders(
            [
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $tokenItem->get(),
                ],
            ]
        );
    }

    /**
     * @return mixed
     */
    public function getPublicTokenExpires()
    {
        return $this->publicTokenExpires;
    }
}
