<?php


namespace ItlabStudio\ApiClient\CodeBase\DenormalizerFactory;

use ApiPlatform\Core\Bridge\Symfony\Validator\Exception\ValidationException;
use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractApiResource;
use ItlabStudio\ApiClient\CodeBase\Helper\ArrayHelper;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseDenormalizerFactoryInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface as SymfonyValidatorInterface;
/**
 * Class ResponseDenormalizerFactory
 *
 * @package ItlabStudio\ApiClient\CodeBase\DenormalizerFactory
 */
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
    protected $data = [];

    /**
     * ResponseDenormalizerFactory constructor.
     *
     * @param DenormalizerInterface $denormalizer
     */
    public function __construct(
        DenormalizerInterface $denormalizer,
        SymfonyValidatorInterface $validator
    ) {
        $this->denormalizer = $denormalizer;
        $this->validator    = $validator;
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
        $this->responseType = $resource;

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
     * @return array
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array|\ItlabStudio\ApiClient\CodeBase\DenormalizerFactory\ResponseCollection|ResponseEntityInterface|null
     */
    public function denormalize()
    {
        if (ArrayHelper::isAssoc($this->data)) {
            return $this->getResponseEntity();
        }

        return $this->getCollectionEntity();
    }

    /**
     * @return array|null
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function getCollectionEntity(): ?array
    {
        $collection = [];

        array_walk($this->data, function ($value, $key) use (&$collection) {

            $object     = $this->denormalizer->denormalize($value, $this->responseType);
            $violations = $this->validator->validate($object);
            if ($object instanceof ResponseEntityInterface && 0 === \count($violations)) {
                $collection[] = $object;
            }
            if (0 !== \count($violations)) {
                throw new ValidationException($violations);
            }
        });

        return $collection;

    }

    /**
     * @return ResponseEntityInterface
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function getResponseEntity(): ?ResponseEntityInterface
    {
        $object     = $this->denormalizer->denormalize($this->data, $this->responseType);
        $violations = $this->validator->validate($object);
        if ($object instanceof ResponseEntityInterface && 0 === \count($violations)) {
            return $object;
        }
        if (0 !== \count($violations)) {
            throw new ValidationException($violations);
        }
    }
}
