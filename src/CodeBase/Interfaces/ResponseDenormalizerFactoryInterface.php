<?php


namespace ItlabStudio\ApiClient\CodeBase\Interfaces;



use ItlabStudio\ApiClient\CodeBase\DenormalizerFactory\ResponseCollection;

/**
 * Interface ResponseDenormalizerFactoryInterface
 *
 * @package App\ApiClient\Interfaces
 */
interface ResponseDenormalizerFactoryInterface
{
    public function getResponseEntity(): ?ResponseEntityInterface;

    public function getCollectionEntity(): ?ResponseCollection;
}
