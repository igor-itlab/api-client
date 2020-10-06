<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers;


use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractMapper;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Currency\Currency as CurrencyEntity;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseMapperInterface;

class Currency extends AbstractMapper implements ResponseMapperInterface
{

    public function getById()
    {
        return $this->buildRelations(__METHOD__, $this->data);
    }

    public function relations()
    {
        return [
        ];
    }

}