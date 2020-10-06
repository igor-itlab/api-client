<?php

namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers;

use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractMapper;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Currency\Currency as CurrencyEntity;
use ItlabStudio\ApiClient\CodeBase\DenormalizerFactory\ResponseCollection;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseMapperInterface;

class Fee extends AbstractMapper implements ResponseMapperInterface
{

    public function getAll()
    {
        return $this->buildRelations(__METHOD__, $this->data);
    }

    public function relations()
    {
       return [
            'currency' => [
                'mapper' => Currency::class,
                'entity' => CurrencyEntity::class,
                'method' => 'getById',
            ],
            'paymentSystem' => [
                'mapper' => Currency::class,
                'entity' => CurrencyEntity::class,
                'method' => 'getById',
            ]
        ];

    }
}