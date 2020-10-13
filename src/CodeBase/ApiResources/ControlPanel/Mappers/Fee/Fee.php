<?php

namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Mappers\Fee;

use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractMapper;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee\FeeCurrency as CurrencyEntity;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee\FeePaymentSystem as PaymentSystemEntity;
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
        return $this->buildRelations(__FUNCTION__, $this->data);
    }

    /**
     * @return \string[][]
     */
    public function relations()
    {
        return [
//            'getAll' => [
//                'currency'      => [
//                    'mapper' => FeeCurrency::class,
//                    'entity' => CurrencyEntity::class,
//                ],
//                'paymentSystem' => [
//                    'mapper' => PaymentSystem::class,
//                    'entity' => PaymentSystemEntity::class,
//                ],
//            ],
        ];
    }
}