<?php


namespace ItlabStudio\ApiClient\CodeBase\WebHookResources\ControlPanel;


use App\Utils\EncryptionManager;
use ItlabStudio\ApiClient\CodeBase\AbstractAuth;
use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractApiResource;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiAuthInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;

/**
 * @property ApiClientInterface $client
 */
class Auth extends AbstractAuth implements ApiAuthInterface
{
    /** @var string */
    static $GUEST_COOKIE_NAME = "ITLAB_GUEST_COOKIE";

    /** @var string */
    protected $apiDomainName = 'www.control-panel.com';

    /** @var string */
    protected $uri = 'auth/login';

    public function __construct(ApiClientInterface $client) {
        parent::__construct($client);
    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function request(array $options = [])
    {
        if (isset($_COOKIE[static::$GUEST_COOKIE_NAME])) {
            $this->client->setToken($_COOKIE[static::$GUEST_COOKIE_NAME]);
        }



        if ($this->client->getToken()) {

            EncryptionManager::encodeSecretKey($this->controlPanelID, $this->controlPanelSecret, );

            return [$this->client->getToken(), $this->client->userAgent];
        }

        $options['content-type']                 = 'application/x-www-form-urlencoded';
        $options['form_params']['grant_type']    = 'client_credentials';
        $options['form_params']['client_id']     = $this->client->getClientId();
        $options['form_params']['client_secret'] = $this->client->getSecretKey();
        $options['headers']['User-Agent']        = $this->client->userAgent;

        return parent::request($options);
    }
}
