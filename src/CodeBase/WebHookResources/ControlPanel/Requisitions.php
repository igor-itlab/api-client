<?php


namespace ItlabStudio\ApiClient\CodeBase\WebHookResources\ControlPanel;


use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractApiResource;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiAuthorizationInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;

/**
 * Class Currencies
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Requisitions extends AbstractWebHookResource implements WebHookInterface
{
    protected $apiDomainName = 'www.control-panel.com';

    protected $uri = 'currencies';

    /**
     * Currencies constructor.
     *
     * @param ApiClientInterface $client
     */
    public function __construct(ApiClientInterface $client)
    {
        $this->setAuthResource(new Auth($client));

        parent::__construct($client);


    }

    /**
     * @param ApiResourceInterface $resource
     *
     * @return mixed|void
     */
    public function setAuthResource(ApiResourceInterface $resource)
    {
        $this->client->setResolvedResource($resource)->checkToken();
    }

    public function getById(int $id)
    {

    }

    public function getAll()
    {

    }
}
