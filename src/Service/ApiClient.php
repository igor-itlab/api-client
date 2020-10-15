<?php

namespace ItlabStudio\ApiClient\Service;

use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\ControlPanelResourceInjector;
use ItlabStudio\ApiClient\CodeBase\Exceptions\ResourceNotFoundException;
use ItlabStudio\ApiClient\CodeBase\Interfaces\{ApiClientInterface, ApiResourceInterface, RequestBuilderInterface, ResourceInjectorInterface, ResponseDenormalizerFactoryInterface};
use ItlabStudio\ApiClient\CodeBase\Proxy\ResponseProxy;
use ItlabStudio\ApiClient\CodeBase\Response\ResponseFactory;
use ItlabStudio\ApiClient\Events\{MappingFailedEvent, AfterCallbacksEvent, AfterMappingEvent, AfterRequestEvent, ApiClientEvents, BeforeRequestEvent, RequestFailedEvent};
use Psr\Http\Message\RequestInterface;
use Symfony\Component\DependencyInjection\{Container, ContainerInterface};
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

            $requestFailed = new RequestFailedEvent(
                $this->resolvedResource,
                $requestBuilder,
                $exception
            );

            $this->eventDispatcher->dispatch(
                $requestFailed,
                ApiClientEvents::REQUEST_FAILED
            );

            $response = $requestFailed->getResponse();
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

        try {
            $response = (new ResponseProxy())
                ->resolveClasses(
                    $this->resolvedResource,
                    $this->responseDenormalizer,
                    $afterRequest->getResponse()
                )
                ->mapResponse();
        } catch (\Exception $exception) {
            $mappingFailedEvent = new MappingFailedEvent(
                $this->resolvedResource,
                $requestBuilder,
                $exception,
                $response
            );
            $this->eventDispatcher->dispatch(
                $mappingFailedEvent,
                ApiClientEvents::REQUEST_FAILED
            );
            $response = $mappingFailedEvent->getResponse();
        }
        finally {

        }

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
