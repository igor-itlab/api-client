<?php

namespace ItlabStudio\ApiClient\Service;

use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\ControlPanelResourceInjector;
use ItlabStudio\ApiClient\CodeBase\Exceptions\BadResponceException;
use ItlabStudio\ApiClient\CodeBase\Interfaces\RequestBuilderInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResourceInjectorInterface;
use ItlabStudio\ApiClient\CodeBase\Exceptions\ResourceNotFoundException;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseDenormalizerFactoryInterface;
use ItlabStudio\ApiClient\CodeBase\Proxy\ResponseProxy;
use ItlabStudio\ApiClient\CodeBase\Response\ResponseFactory;
use ItlabStudio\ApiClient\Events\AfterCallbacksEvent;
use ItlabStudio\ApiClient\Events\AfterMappingEvent;
use ItlabStudio\ApiClient\Events\AfterRequestEvent;
use ItlabStudio\ApiClient\Events\ApiClientEvents;
use ItlabStudio\ApiClient\Events\BeforeRequestEvent;
use ItlabStudio\ApiClient\Events\RequestFailedEvent;
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

    /** @var ResourceInjectorInterface */
    protected $resourceInjector;

    /** @var ContainerInterface */
    protected $container;

    protected $resolvedResource;

    protected $eventDispatcher;

    /** @var ResponseDenormalizerFactoryInterface */
    protected $responseDenormalizer;

    /**
     * ApiClient constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(
        ContainerInterface $container
    ) {
        $this->container            = $container;
        $this->eventDispatcher      = $this->container->get('event_dispatcher');
        $this->responseDenormalizer = $this->container->get('itlab_studio_api_client.response_denormalizer');;
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

            if ($this->resourceInjector = $this->container->get(
                'api_client.' . Container::underscore($method) . '_resource_injector'
            )) {
                return $this->resourceInjector;
            }
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
     * @param RequestBuilderInterface $requestBuilder
     *
     * @return bool|mixed
     */
    public function makeRequest(RequestBuilderInterface $requestBuilder)
    {
        $beforeRequest = new BeforeRequestEvent(
            $this->resolvedResource,
            $requestBuilder
        );
        $this->eventDispatcher->dispatch(
            $beforeRequest,
            ApiClientEvents::BEFORE_REQUEST
        );

        if (!$beforeRequest->continue) {
            throw new \Exception('The request is interrupted by ApiClientEvents::BEFORE_REQUEST');
        }

        try {
            $response = $this->resourceInjector->responseClass::createFromResponse(
                $requestBuilder->makeRequest()->request(
                    $requestBuilder->getMethod(),
                    $requestBuilder->getUri()
                )
            );

        } catch (\Exception $exception) {

            $this->eventDispatcher->dispatch(
                new RequestFailedEvent(
                    $this->resolvedResource,
                    $requestBuilder,
                    $exception
                ),
                ApiClientEvents::REQUEST_FAILED
            );
        }
        finally {
        }

        $afterRequest = new AfterRequestEvent(
            $this->resolvedResource,
            $requestBuilder,
            $response
        );

        $this->eventDispatcher->dispatch(
            $afterRequest,
            ApiClientEvents::AFTER_REQUEST
        );

        if (!$afterRequest->continue) {
            throw new \Exception('The request is interrupted by ApiClientEvents::AFTER_REQUEST');
        }

        $response = (new ResponseProxy())
            ->resolveClasses(
                $this->resolvedResource,
                $this->responseDenormalizer,
                $afterRequest->getResponse()
            )
            ->mapResponse();

        $afterMappingEvent = new AfterMappingEvent(
            $this->resolvedResource,
            $requestBuilder,
            $response
        );

        $this->eventDispatcher->dispatch(
            $afterMappingEvent,
            ApiClientEvents::AFTER_MAPPING
        );

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

    /**
     * @return ResourceInjectorInterface
     *
     */
    public function getResourceInjector()
    {
        return $this->resourceInjector;
    }
}
