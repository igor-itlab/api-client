<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers\Fee;


use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractMapper;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Currency\Currency as CurrencyEntity;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseMapperInterface;

/**
 * Class Currency
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers
 */
class Currency extends AbstractMapper implements ResponseMapperInterface
{
    /**
     * @return array
     */
    public function getAll()
    {
        return $this->buildRelations(__FUNCTION__, $this->data);
    }

    /**
     * @return array
     */
    public function relations()
    {
        return [];
    }

}