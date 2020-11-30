<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers\Fee;


use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractMapper;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseMapperInterface;

class PaymentSystem extends AbstractMapper implements ResponseMapperInterface
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