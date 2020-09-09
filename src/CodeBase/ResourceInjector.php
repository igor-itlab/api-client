<?php

namespace ItlabStudio\ApiClient\CodeBase;

use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\AttributePrerequest;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Auth;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Balances;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Currency;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Document;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Exchanger;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Fee;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\HistoryRate;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Payment;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\PaymentSystem;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Payout;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Rate;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Transfer;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResourceInjectorInterface;
use Symfony\Component\DependencyInjection\Container;

/**
 * Class ResourceInjector
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources
 */
class ResourceInjector implements ResourceInjectorInterface
{

    /**
     * @var ApiClientInterface
     */
    protected $client;

    protected $handler;
    /**
     * @var Container
     */
    protected $container;

    public function __construct(ApiClientInterface $client, Container $container)
    {
        $this->client = $client;
        $this->container = $container;
    }

    /**
     * @param $method
     *
     * @return bool
     */
    public function supports($method)
    {
        return method_exists($this, $method);
    }

    /** @return Auth */
    public function CPAuth()
    {
        /** @var Auth */
        return new Auth($this->client);
    }

    /**
     * @return Currency
     */
    public function Currency()
    {
        /** @var Currency */
        return new Currency($this->client);
    }

    /**
     * @return AttributePrerequest
     */
    public function AttributePrerequest()
    {
        /** @var AttributePrerequest */
        return new AttributePrerequest($this->client);
    }

    /**
     * @return Balances
     */
    public function Balances()
    {
        /** @car Balances */
        return new Balances($this->client);
    }

    /**
     * @return Document
     */
    public function Document()
    {
        /** @var Document */
        return new Document($this->client);
    }

    /**
     * @return Exchanger
     */
    public function Exchanger()
    {
        /** @var Exchanger */
        return new Exchanger($this->client);
    }

    /**
     * @return Fee
     */
    public function Fee()
    {
        /** @var Fee */
        return new Fee($this->client);
    }

    /**
     * @return HistoryRate
     */
    public function HistoryRate()
    {
        /** @var HistoryRate */
        return new HistoryRate($this->client);
    }

    /**
     * @return Payment
     */
    public function Payment()
    {
        /** @var Payment */
        return new Payment($this->client);
    }

    /**
     * @return PaymentSystem
     */
    public function PaymentSystem()
    {
        /** @var PaymentSystem */
        return new PaymentSystem($this->client);
    }

    /**
     * @return Payout
     */
    public function Payout()
    {
        /** @var Payout */
        return new Payout($this->client);
    }

    /**
     * @return Rate
     */
    public function Rate()
    {
        /** @var Rate */
        return new Rate($this->client);
    }

    /**
     * @return Transfer
     */
    public function Transfer()
    {
        /** @var Transfer */
        return new Transfer($this->client);
    }
}
