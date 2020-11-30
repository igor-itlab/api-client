<?php

namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers;

use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractMapper;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Currency\Currency as CurrencyEntity;
use ItlabStudio\ApiClient\CodeBase\DenormalizerFactory\ResponseCollection;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseMapperInterface;

/**
 * Class Fee
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers
 */
class Fee extends AbstractMapper implements ResponseMapperInterface
{
    /**
     * @return array
     */
    public function getAll()
    {
        /**  $this->data might be an array */
        return $this->buildRelations(__METHOD__, $this->data);
    }

    /**
     * @return \string[][]
     */
    public function relations()
    {
        return [
            'currency'      => [
                'mapper' => Currency::class,
                'entity' => CurrencyEntity::class,
                'method' => 'getById',
            ],
            'paymentSystem' => [
                'mapper' => Currency::class,
                'entity' => CurrencyEntity::class,
                'method' => 'getById',
            ],
        ];
    }
}