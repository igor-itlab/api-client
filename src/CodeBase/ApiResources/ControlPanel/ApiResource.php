<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractApiResource;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiAuthInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiAuthorizationInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\HttpRequestBuilderInterface;
use ItlabStudio\ApiClient\Service\EncryptionManager;

/**
 * @property  string
 */
class ApiResource extends AbstractApiResource implements ApiAuthorizationInterface
{
    /**
     * @param $requestString
     * @param $key
     *
     * @return mixed
     */
    public function getSignature($requestString, $key)
    {
        return EncryptionManager::encodeSignature(
            $requestString,
            $this->client->getResourceInjector()->Auth(static::$TYPE_PRIVATE)->getSecretKey()
        );
    }

    /**
     * @param $type
     *
     * @return mixed|void
     */
    public function auth($type)
    {

    }

    /**
     * @param HttpRequestBuilderInterface $requestBuilder
     *
     * @return mixed
     */
    protected function makeRequest(HttpRequestBuilderInterface $requestBuilder)
    {
        if (!$this instanceof ApiAuthInterface) {
            $requestBuilder->withHeaders(
                $this->getAuthData(static::$TYPE_PRIVATE)['headers']
            );
        }

        $requestBuilder->withDomain($_ENV['CP_CLIENT_DOMAIN_NAME']);

        return parent::makeRequest($requestBuilder);
    }

    /**
     * @param $type
     *
     * @return mixed
     */
    public function getAuthData($type = null)
    {
        return $this->client->getResourceInjector()->Auth($type)->getAuthData();
    }
}
