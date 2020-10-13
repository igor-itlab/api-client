<?php


namespace ItlabStudio\ApiClient\CodeBase\Proxy;


use ApiPlatform\Core\Bridge\Symfony\Validator\Exception\ValidationException;
use ItlabStudio\ApiClient\CodeBase\DenormalizerFactory\ResponseCollection;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiResourceInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseDenormalizerFactoryInterface;
use Symfony\Component\Validator\Validation;

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
     * @var ApiResourceInterface
     */
    protected $resource;

    protected $denormalizer;

    public function __construct($data = null, $mapperClass = null, $entityClass = null, $calledMethod = null)
    {
        $this->data         = $data;
        $this->mapperClass  = $mapperClass;
        $this->entityClass  = $entityClass;
        $this->calledMethod = $calledMethod;
        $this->validator    = Validation::createValidator();
    }

    public function resolveClasses(
        ApiResourceInterface $resource,
        ResponseDenormalizerFactoryInterface $responseDenormalizer,
        $response = null
    ) {
        $this->data = $response;

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

    public function mapResponse()
    {
        $response = new ResponseCollection();

        if (class_exists($this->mapperClass)
            && method_exists($this->mapperClass, $this->calledMethod)) {

            $response = (new $this->mapperClass($this->data))->{$this->calledMethod}();

        } else {
            $response = $this->data;
        }

        if ($this->denormalizer && class_exists($this->entityClass)) {
            return $this->denormalizer
                ->setResponseType($this->entityClass)
                ->setData($response)
                ->denormalize();
        }

        return $response;
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