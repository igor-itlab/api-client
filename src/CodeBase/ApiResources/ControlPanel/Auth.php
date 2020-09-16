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
    protected $apiDomainName;

    protected $apiConnectionId;

    /**
     * Auth constructor.
     * @param ApiClientInterface $client
     */
    public function __construct(ApiClientInterface $client, $type)
    {
        $this->privateTokenExpires = (int)$_ENV['CP_PRIVATE_TOKEN_EXPIRES'];
        $this->publicTokenExpires = (int)$_ENV['CP_PUBLIC_TOKEN_EXPIRES'];
        $this->endpointType = $type;
        parent::__construct($client, $type);

        if ($type == ApiResource::$TYPE_PRIVATE) {
            $this->generateToken();

            return;
        }

        $this->request();
    }
}
