<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers\Payment;


use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractMapper;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseMapperInterface;

/**
 * Class Currency
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers
 */
class Payment extends AbstractMapper implements ResponseMapperInterface
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
    public function external()
    {
        return $this->buildRelations(__FUNCTION__, [$this->data]);
    }

    /**
     * @return array
     */
    public function verification()
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
