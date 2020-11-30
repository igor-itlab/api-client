<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers\Payout;


use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractMapper;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseMapperInterface;

/**
 * Class Currency
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers
 */
class Payout extends AbstractMapper implements ResponseMapperInterface
{
    /**
     * @return array
     */
    public function setInvoice()
    {
        return $this->buildRelations(__FUNCTION__, [$this->data]);
    }

    /**
     * @return array
     */
    public function relations()
    {
        return [];
    }
}
