<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

use ItlabStudio\ApiClient\Service\EncryptionManager;
use ItlabStudio\ApiClient\CodeBase\AbstractAuth;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiAuthInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use Psr\Cache\CacheItemInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * @property ApiClientInterface $client
 */
class Auth extends AbstractAuth implements ApiAuthInterface
{
    /** @var string */
    protected static $API_CLIENT_TOKEN_NAME = "ITLAB_CP_API_CLIENT_TOKEN";

    /**
     * Auth constructor.
     *
     * @param ApiClientInterface $client
     * @param                    $type
     * @param                    $clientId
     * @param                    $secretKey
     * @param                    $privateTokenExpires
     * @param                    $publicTokenExpires
     */
    public function __construct(
        ApiClientInterface $client,
        $type,
        $clientId,
        $secretKey,
        $privateTokenExpires,
        $publicTokenExpires
    ) {
        $this->apiDomainName       = $_ENV['CP_CLIENT_DOMAIN_NAME'];
        $this->endpointType        = $type;
        $this->clientId            = $clientId;
        $this->secretKey           = $secretKey;
        $this->privateTokenExpires = $privateTokenExpires;
        $this->publicTokenExpires  = $publicTokenExpires;

        parent::__construct($client, $type);
    }

    /**
     * @param null $resource
     */
    public function getAuthData($resource = null)
    {
        if ($this->type === ApiResource::$TYPE_PRIVATE) {

            return $this->generateTokenData();
        }

        return $this->requestTokenData();
    }

    /**
     * @return \string[][]
     */
    public function generateTokenData()
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

        return [
            'headers' => [
                'Authorization' => 'JWS-AUTH-TOKEN ' . $tokenItem->get(),
            ],
        ];
    }

    /**
     * @param array $options
     *
     * @return array
     */
    protected function requestTokenData(array $options = [])
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
            $token = $this->makeRequest(
                $this->request()
            );

            $tokenItem->expiresAfter($this->getPublicTokenExpires());
            $tokenItem->set($token);
            $this->cache->save($tokenItem);
        }

        return [
            'headers' => [
                'Authorization' => 'Bearer ' . $tokenItem->get(),
            ],
        ];
    }
}
