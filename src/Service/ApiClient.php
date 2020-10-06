<?php

namespace ItlabStudio\ApiClient\Service;

use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\ControlPanelResourceInjector;
use ItlabStudio\ApiClient\CodeBase\Exceptions\BadResponceException;
use ItlabStudio\ApiClient\CodeBase\Interfaces\RequestBuilderInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResourceInjectorInterface;
use ItlabStudio\ApiClient\CodeBase\Exceptions\ResourceNotFoundException;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;
use ItlabStudio\ApiClient\Events\AfterRequestEvent;
use ItlabStudio\ApiClient\Events\ApiClientEvents;
use ItlabStudio\ApiClient\Events\BeforeRequestEvent;
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
     * ApiClient constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(
        ContainerInterface $container
    ) {
        $this->container       = $container;
        $this->eventDispatcher = $this->container->get('event_dispatcher');
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
        try {
            $beforeRequest = new BeforeRequestEvent(
                $this->resolvedResource,
                $requestBuilder
            );
            $this->eventDispatcher->dispatch(
                $beforeRequest,
                ApiClientEvents::BEFORE_REQUEST
            );

            $response = $requestBuilder->makeRequest()->request(
                $requestBuilder->getMethod(),
                $requestBuilder->getUri()
            );

            $afterEvent = new AfterRequestEvent(
                $this->resolvedResource,
                $requestBuilder,
                $response
            );

            $this->eventDispatcher->dispatch(
                $afterEvent,
                ApiClientEvents::AFTER_REQUEST
            );

            return $afterEvent->getResponse();

        } catch (NotFoundHttpException $e) {
        } catch (BadResponceException $e) {
            return false;
        }
        finally {
        }
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
