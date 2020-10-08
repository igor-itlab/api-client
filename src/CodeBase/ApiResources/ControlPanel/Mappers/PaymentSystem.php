<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers;


use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractMapper;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseMapperInterface;

/**
 * Class PaymentSystem
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers
 */
class PaymentSystem extends AbstractMapper implements ResponseMapperInterface
{
    /**
     * @param $property
     *
     * @return array
     */
    public function relations()
    {
        return [];
    }
}