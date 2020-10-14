<?php


namespace ItlabStudio\ApiClient\CodeBase\Proxy;


use ApiPlatform\Core\Bridge\Symfony\Validator\Exception\ValidationException;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseDenormalizerFactoryInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class ResponseProxy
 *
 * @package ItlabStudio\ApiClient\CodeBase\Proxy
 */
class ResponseProxy
{
    /**
     * @var string
     */
    protected $entityClass;
    /**
     * @var string
     */
    protected $mapperClass;
    /**
     * @var mixed
     */
    protected $calledMethod;

    /**
     * @var mixed|string
     */
    protected $resourceClass;

    /**
     * @var ResponseDenormalizerFactoryInterface
     */
    protected $denormalizer;

    protected $response;

    public function __construct($data = null, $mapperClass = null, $entityClass = null, $calledMethod = null)
    {
        $this->data         = $data;
        $this->mapperClass  = $mapperClass;
        $this->entityClass  = $entityClass;
        $this->calledMethod = $calledMethod;
    }

    /**
     * @param ApiResourceInterface                 $resource
     * @param ResponseDenormalizerFactoryInterface $responseDenormalizer
     * @param                                      $response
     *
     * @return $this
     */
    public function resolveClasses(
        ApiResourceInterface $resource,
        ResponseDenormalizerFactoryInterface $responseDenormalizer,
        $response
    ) {
        $this->response = $response;

        $this->data = $response->getData();

        $this->denormalizer = $responseDenormalizer;

        $resourceStack = array_filter($resource->calledResourceStack, function ($item) use ($resource) {
            return get_class($resource) === $item['class'];
        });
        $resourceStack = array_pop($resourceStack);

        /**
         * @TODO: Implement pregreplace instead of explode
         */
//        $this->mapperClass          = preg_replace('/.+\\(.+)$/', 'Mappers\\1/', "App\ApiClient\ApiResources\Huobi\Balance");
        $explodedClass       = explode('\\', $resourceStack['class']);
        $this->resourceClass = array_pop($explodedClass);
        $this->calledMethod  = $resourceStack['function'];

        $this->mapperClass = implode('\\', array_merge(
            $explodedClass,
            ['Mappers', $this->resourceClass, $this->resourceClass]
        ));
        $this->entityClass = implode('\\', array_merge(
                $explodedClass,
                ['Responses', $this->resourceClass, $this->calledMethod]
            )
        );

        return $this;
    }

    /**
     * @return mixed
     */
    public function mapResponse()
    {
        $response = [];

        if (class_exists($this->mapperClass)
            && method_exists($this->mapperClass, $this->calledMethod)) {

            $response = (new $this->mapperClass($this->data))->{$this->calledMethod}();

        } else {
            $response = $this->data;
        }

        if ($this->denormalizer && class_exists($this->entityClass)) {
            $response = $this->denormalizer
                ->setResponseType($this->entityClass)
                ->setData($response)
                ->denormalize();
        }

        return $this->response->setData($response);
    }

    /**
     * @param mixed|string $resourceClass
     */
    public function setResourceClass($resourceClass): void
    {
        $this->resourceClass = $resourceClass;
    }

    /**
     * @param string $mapperClass
     */
    public function setMapperClass(string $mapperClass): void
    {
        $this->mapperClass = $mapperClass;
    }

    /**
     * @param string $entityClass
     */
    public function setEntityClass(string $entityClass): void
    {
        $this->entityClass = $entityClass;
    }

    /**
     * @param mixed $calledMethod
     */
    public function setCalledMethod($calledMethod): void
    {
        $this->calledMethod = $calledMethod;
    }
}