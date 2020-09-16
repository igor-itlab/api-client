<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractApiResource;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiAuthorizationInterface;
use ItlabStudio\ApiClient\Service\EncryptionManager;

/**
 * @property  string
 */
class ApiResource extends AbstractApiResource  implements ApiAuthorizationInterface
{

    /**
     * ApiResource constructor.
     * @param ApiClientInterface $client
     */
    public function __construct(ApiClientInterface $client)
    {
        $this->client = $client;
        $this->apiDomainName = $_ENV['CP_CLIENT_DOMAIN_NAME'];
        $client->setConnectionId($_ENV['CP_CLIENT_CONNECTION_ID']);
        parent::__construct($client);
    }

    /**
     * @param $type
     * @return mixed|void
     */
    public function auth($type)
    {
        $this->client->CPAuth($type);
        $this->client->setResolvedResource($this);
    }

    /**
     * @param $requestString
     * @param $key
     * @return mixed
     */
    public function getSignature($requestString, $key)
    {
        return EncryptionManager::encodeSignature(
            $requestString,
            $key
        );
    }
}
