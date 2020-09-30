<?php

namespace ItlabStudio\ApiClient\Service;

use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\ControlPanelResourceInjector;
use ItlabStudio\ApiClient\CodeBase\Exceptions\BadResponceException;
use ItlabStudio\ApiClient\CodeBase\Interfaces\RequestBuilderInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResourceInjectorInterface;
use ItlabStudio\ApiClient\CodeBase\Exceptions\ResourceNotFoundException;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\NativeHttpClient;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/**
 * Class ApiClient
 *
 * @method ControlPanelResourceInjector ControlPanel
 *
 * @package ItlabStudio\ApiClient\Service
 */
class ApiClient implements ApiClientInterface
{
    public $userAgent = "ITLAB_STUDIO_API_CLIENT";

    protected $langCode;

    protected $headers = [];

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

    /**
     * @var \ItlabStudio\ApiClient\Service\ApiResourceCallbackHandler
     */
    protected $callbackHandler;

    /**
     * ApiClient constructor.
     *
     * @param ContainerInterface                                        $container
     * @param string                                                    $controlPanelID
     * @param string                                                    $controlPanelSecret
     * @param \ItlabStudio\ApiClient\Service\ApiResourceCallbackHandler $callbackHandler
     */
    public function __construct(
        ContainerInterface $container,
        ApiResourceCallbackHandler $callbackHandler
    ) {
        $this->container       = $container;
        $this->callbackHandler = $callbackHandler;
//        $this->handler = new NativeHttpClient();
//        $this->handler = HttpClient::class;
//        $this->handler = new RequestBuilder();
    }

    /**
     * @param $method
     * @param $parameters
     *
     * @return ResourceInjectorInterface| \Exception
     */
    public function __call($method, $parameters)
    {
        if (!method_exists($this, $method)) {

            if (($this->resourceInjector = $this->container->get(
                'api_client.' . Container::underscore($method) . '_resource_injector'
            ))
//                && ($resourceMethod = array_shift($parameters))
//                && $this->resourceInjector->supports($resourceMethod)
            ) {
                return $this->resourceInjector;

//                return call_user_func_array([$this->resourceInjector, $resourceMethod], $parameters);
            }
//

        }

        throw new ResourceNotFoundException('Resource "' . $method . '" not found. ' . __FILE__ . ': ' . __LINE__);

    }

    /**
     * @return string
     */
    public function getLangCode()
    {
        return $this->langCode;
    }

    /**
     * @param array  $options
     * @param        $method
     * @param string $uriAppend
     * @param array  $queryParams
     * @param array  $callbacks
     *
     * @return bool
     */
//    public function makeRequest(array $options, $method, $uriAppend = '', array $queryParams = [], $callbacks = [])
    public function makeRequest(RequestBuilderInterface $requestBuilder)
    {

        try {
            $response = $requestBuilder->makeRequest()->request(
                $requestBuilder->getMethod(),
                $requestBuilder->getUri()
            );;

            return $this->callbackHandler->setCustom($requestBuilder->getCallbacks())->fire($this->resolvedResource, $response);
        } catch (NotFoundHttpException $e) {
        } catch (BadResponceException $e) {
            return false;
        }
        finally {
        }
    }

//
//    /**
//     * {@inheritdoc}
//     */
//    public function sendRequest(string $httpMethod, $uri, array $headers = [], $body = null): ResponseInterface
//    {
//        $request = $this->requestFactory->createRequest($httpMethod, $uri);
//
//        if (null !== $body && is_string($body)) {
//            $request = $request->withBody($this->streamFactory->createStream($body));
//        }
//        if (null !== $body && $body instanceof StreamInterface) {
//            $request = $request->withBody($body);
//        }
//
//        foreach ($headers as $header => $content) {
//            $request = $request->withHeader($header, $content);
//        }
//
//        $response = $this->httpClient->sendRequest($request);
//        $response = $this->httpExceptionHandler->transformResponseToException($request, $response);
//
//        return $response;
//    }

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

    /**
     * @return ResourceInjectorInterface
     *
     */
    public function getResourceInjector()
    {
        return $this->resourceInjector;
    }

    /**
     * @param string $connectionId
     */
    public function setConnectionId(string $connectionId): void
    {
        $this->connectionId = $connectionId;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param $headers
     *
     * @return ApiClient
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;

        return $this;
    }
}
