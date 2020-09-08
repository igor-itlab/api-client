<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;


use App\Utils\EncryptionManager;
use ItlabStudio\ApiClient\CodeBase\AbstractAuth;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiAuthInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * @property ApiClientInterface $client
 */
class Auth extends AbstractAuth implements ApiAuthInterface
{
    /** @var string */
    protected static $API_CLIENT_TOKEN_NAME = "ITLAB_CP_API_CLIENT_TOKEN";

    /** @var string */
    protected $apiDomainName = 'www.control-panel.com';

    /**
     * Auth constructor.
     * @param ApiClientInterface $client
     */
    public function __construct(ApiClientInterface $client)
    {
        parent::__construct($client);

        $this->request();
    }
}
