<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;


use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractApiResource;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiAuthorizationInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class Currencies
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class CryptoCurrencies extends AbstractApiResource implements ApiAuthorizationInterface
{
    protected $apiDomainName;

    protected $uri;

    /**
     * Currencies constructor.
     *
     * @param ApiClientInterface $client
     */
    public function __construct(ApiClientInterface $client)
    {
        $this->client = $client;
        $this->auth();

        $this->apiDomainName = $_ENV['CP_CLIENT_DOMAIN_NAME'];
        parent::__construct($client);
    }

    /**
     * @return mixed|void
     */
    public function auth()
    {
        $this->client->CPAuth();
    }

    public function getById(int $id)
    {
    }

    public function getAll()
    {
        $this->method = 'GET';
        $this->uri = 'private/rates';

        return $this->request();
    }
}
