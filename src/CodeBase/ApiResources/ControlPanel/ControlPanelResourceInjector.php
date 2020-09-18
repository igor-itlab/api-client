<?php

namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ApiClientInterface;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResourceInjectorInterface;

/**
 * Class ResourceInjector
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources
 */
class ControlPanelResourceInjector implements ResourceInjectorInterface
{

    /**
     * @var ApiClientInterface
     */
    protected $client;

    protected $handler;
    /**
     * @var string
     */
    protected $clientId;
    /**
     * @var string
     */
    protected $secretKey;

    public function __construct(
        ApiClientInterface $client,
        string $controlPanelID,
        string $controlPanelSecret,
        $privateTokenExpires,
        $publicTokenExpires
    ) {
        $this->client              = $client;
        $this->clientId            = $controlPanelID;
        $this->secretKey           = $controlPanelSecret;
        $this->privateTokenExpires = (int)$privateTokenExpires;
        $this->publicTokenExpires  = (int)$publicTokenExpires;
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
    public function Auth($type)
    {
        /** @var Auth */
        return new Auth(
            $this->client,
            $type,
            $this->clientId,
            $this->secretKey,
            $this->privateTokenExpires,
            $this->publicTokenExpires
        );
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

    /**
     * @return Connection
     */
    public function Connection()
    {
        /** @var Connection */
        return new Connection($this->client);
    }

    /**
     * @return Service
     */
    public function Service()
    {
        /** @var Service */
        return new Service($this->client);
    }

    /**
     * @return string
     */
    protected function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     *
     * @return ControlPanelResourceInjector
     */
    protected function setClientId(string $clientId): ControlPanelResourceInjector
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return string
     */
    protected function getSecretKey(): string
    {
        return $this->secretKey;
    }

    /**
     * @param string $secretKey
     *
     * @return ControlPanelResourceInjector
     */
    protected function setSecretKey(string $secretKey): ControlPanelResourceInjector
    {
        $this->secretKey = $secretKey;

        return $this;
    }
}
