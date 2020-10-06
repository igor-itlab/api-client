<?php


namespace ItlabStudio\ApiClient\CodeBase\DenormalizerFactory;


//use ItlabStudio\ApiClient\CodeBase\ApiResources\Huobi\ApiResource;
use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractApiResource;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseDenormalizerFactoryInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use ItlabStudio\ApiClient\CodeBase\DenormalizerFactory\ResponseCollection;
use ItlabStudio\ApiClient\CodeBase\Proxy\ResponseProxy;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ResponseDenormalizerFactory implements ResponseDenormalizerFactoryInterface
{
    /**
     * @var DenormalizerInterface
     */
    protected $denormalizer;

    /**
     * @var string
     */
    protected $responseType;

    /**
     * @var array
     */
    protected $data;

    /**
     * ResponseDenormalizerFactory constructor.
     *
     * @param DenormalizerInterface $denormalizer
     */
    public function __construct(DenormalizerInterface $denormalizer)
    {
        $this->denormalizer = $denormalizer;
    }

    /**
     * @return string
     */
    public function getResponseType(): string
    {
        return $this->responseType;
    }

    /**
     * @param AbstractApiResource $responseType
     *
     * @return ResponseDenormalizerFactory
     */
    public function setResponseType($resource): ResponseDenormalizerFactory
    {


        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return ResponseDenormalizerFactory
     */
    public function mapResponse($resource, array $data): ResponseDenormalizerFactory
    {
        $this->data = new ResponseProxy($resource, $data);

        return $this;
    }

    /**
     * @return ResponseEntityInterface
     * @throws ExceptionInterface
     */
    public function getResponseEntity(): ?ResponseEntityInterface
    {
        $object = $this->denormalizer->denormalize($this->data, $this->responseType);
        if ($object instanceof ResponseEntityInterface) {
            return $object;
        }

        return null;
    }

    /**
     * @return array|null
     * @throws ExceptionInterface
     */
    public function getCollectionEntity(): ?ResponseCollection
    {
        if (is_array($this->data)) {
            $collection   = new ResponseCollection();
            $denormalizer = $this->denormalizer;
            $responseType = $this->responseType;

            array_walk($this->data, function ($value, $key) use (&$collection, $denormalizer, $responseType) {
                $object = $denormalizer->denormalize($value, $responseType);
                if ($object instanceof ResponseEntityInterface) {
                    $collection->add($object);
                }
            });

            return $collection;
        }

        return null;
    }
}
