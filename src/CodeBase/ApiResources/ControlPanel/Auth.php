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

    public function doAuth()
    {
        $this->client->setResolvedResource($this);

        if ($this->type === ApiResource::$TYPE_PRIVATE) {
            $this->generateToken();

            return;
        }

        $this->request();
    }
}
