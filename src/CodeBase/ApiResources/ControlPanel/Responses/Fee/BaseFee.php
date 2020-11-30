<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class BaseFee
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee
 */
class BaseFee implements ResponseEntityInterface
{

    /**
     * @var string
     * @Assert\NotNull
     */
    private $id;

    /**
     * @var ?FeeCurrency
     * @Assert\Valid()
     */
    private ?FeeCurrency $currency;

    /**
     * @var FeeService
     * @Assert\Valid()
     */
    private $service;
    /**
     * @var ?FeePaymentSystem
     * @Assert\Valid()
     */
    private ?FeePaymentSystem $paymentSystem;

    /**
     * @var mixed
     */
    private $feeType = [];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }


    /**
     * @return FeeCurrency
     */
    public function getCurrency(): FeeCurrency
    {
        return $this->currency;
    }

    /**
     * @param ?FeeCurrency $currency
     */
    public function setCurrency(?FeeCurrency $currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return FeeService
     */
    public function getService(): FeeService
    {
        return $this->service;
    }

    /**
     * @param FeeService $service
     */
    public function setService(FeeService $service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @return FeePaymentSystem
     */
    public function getPaymentSystem(): FeePaymentSystem
    {
        return $this->paymentSystem;
    }

    /**
     * @param ?FeePaymentSystem $paymentSystem
     */
    public function setPaymentSystem(?FeePaymentSystem $paymentSystem)
    {
        $this->paymentSystem = $paymentSystem;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFeeType()
    {
        return $this->feeType;
    }

    /**
     * @param mixed $feeType
     */
    public function setFeeType($feeType)
    {
        $this->feeType = $feeType;

        return $this;
    }
}
