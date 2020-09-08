<?php

namespace ItlabStudio\ApiClient\Service;

use ItlabStudio\ApiClient\CodeBase\Interfaces\ResourceInjectorInterface;
use ItlabStudio\ApiClient\CodeBase\Exceptions\ResourceNotFoundException;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\NativeHttpClient;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ApiClient
 *
 * @package ItlabStudio\ApiClient\Service
 */
class ApiClient implements ApiClientInterface
{
    public $userAgent = "ITLAB_STUDIO_API_CLIENT";

    protected $langCode;

    protected $clientId;
    protected $secretKey;

    protected $async = false;

    /**
     * @var RequestInterface|string
     */
    protected $handler;

    /** @var ResourceInjectorInterface */
    protected $resourceInjector;

    /** @var ContainerInterface */
    protected $container;

    protected $resolvedResource;

    protected $token;
    protected $tokenExpires;

    /**
     * ApiClient constructor.
     * @param ContainerInterface $container
     * @param $controlPanelID
     * @param $controlPanelSecret
     * @param $expiresTime
     */
    public function __construct(
        ContainerInterface $container,
        string $controlPanelID,
        string $controlPanelSecret,
        int $expiresTime
    ) {
        $this->container = $container;
        $this->clientId = $controlPanelID;
        $this->secretKey = $controlPanelSecret;
        $this->tokenExpires = $expiresTime;
        $this->handler = new NativeHttpClient();
//        $this->handler = HttpClient::class;
    }

    /**
     * @param $method
     * @param $parameters
     */
    public function __call($method, $parameters)
    {
        $this->resourceInjector = $this->container->get('itlab_studio_api_client_service.api_client_resources');

        if ($this->resourceInjector->supports($method)) {
            return $this->resourceInjector->{$method}($parameters);
        }

        if (!method_exists($this, $method)) {
            throw new ResourceNotFoundException('Resource "' . $method . '" not found. ' . __FILE__ . ': ' . __LINE__);
        }
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     *
     * @return $this
     */
    public function setClientId(string $clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return string
     */
    public function getSecretKey()
    {
        return $this->secretKey;
    }

    /**
     * @param string $secretKey
     *
     * @return $this
     */
    public function setSecretKey(string $secretKey)
    {
        $this->secretKey = $secretKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getTokenExpires()
    {
        return $this->tokenExpires;
    }

    /**
     * @param string $tokenExpires
     *
     * @return $this
     */
    public function setTokenExpires(string $tokenExpires)
    {
        $this->tokenExpires = $tokenExpires;

        return $this;
    }

    /**
     * @return string
     */
    public function getLangCode()
    {
        return $this->langCode;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * @param array $options
     * @param        $method
     * @param string $uriAppend
     * @param array $queryParams
     *
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function request(array $options, $method, $uriAppend = '', array $queryParams = [])
    {
        if ($this->token) {
            $options = [
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'JWS-AUTH-TOKEN ' . $this->token
                ]
            ];
        }

        //Add query params
        if ($queryParams) {
            $uriAppend .= '?' . urldecode(http_build_query($queryParams));
        }

        if (isset($options['body'])) {
            switch (strtolower($method)) {
                case 'get' :
                    $options['body'] = json_encode($options['body']);
                    break;

                case 'put':
                    $options['body'] = http_build_query($options['body']);
                    $options['headers']['Content-Type'] = 'application/x-www-form-urlencoded';
                    break;

                case 'patch':
                    $options['body'] = json_encode($options['body']);
                    $options['headers']['Content-Type'] = 'application/json';
                    $method = 'PUT';
                    break;

                case 'post':
                    $options['headers']['Content-Type'] = 'application/x-www-form-urlencoded';
                    $options['form_params'] = $options['body'];
                    break;

                case 'delete':
                    $options['body'] = http_build_query($options['body']);
                    break;
            }
        }

        try {
            $response = $this->handler->request(
                $method,
                $uriAppend,
                $options
            )->toArray();

//            return ($this->handler::create($options))->request(
//                $method,
//                $uriAppend,
//                $queryParams
//            );
        } catch (NotFoundHttpException $e) {
        }

        return $response;
    }

    /**
     * @param ApiResourceInterface $resolvedResource
     *
     * @return ApiClient
     */
    public function setResolvedResource($resolvedResource)
    {
        $this->resolvedResource = $resolvedResource;

        return $this;
    }
}
