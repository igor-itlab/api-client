<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers\Document;


use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractMapper;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseMapperInterface;

/**
 * Class Currency
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers
 */
class Document extends AbstractMapper implements ResponseMapperInterface
{
    /**
     * @return array
     */
    public function verify()
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
