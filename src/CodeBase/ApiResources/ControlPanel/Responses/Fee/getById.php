<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee;

use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\PaymentSystem;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee\FeeCurrency;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class getById
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee
 */
class getById extends getAll
{

    /**
     * @Assert\PositiveOrZero()
     */
    protected $percent;
    /**
     * @Assert\PositiveOrZero()
     */
    protected $constant;
    /**
     * @Assert\PositiveOrZero()
     */
    protected $min;
    /**
     * @Assert\PositiveOrZero()
     */
    protected $max;
    /**
     * @var string
     *
     */
    protected $direction;
    /**
     * @var string
     * @Assert\NotNull
     */
    private $id;
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
     * @var ?FeeCurrency
     * @Assert\Valid()
     */
    private ?FeeCurrency $currency;

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
     * @return mixed
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * @param $percent
     */
    public function setPercent($percent): void
    {
        $this->percent = $percent;
    }

    /**
     * @return mixed
     */
    public function getConstant()
    {
        return $this->constant;
    }

    /**
     * @param $constant
     */
    public function setConstant($constant): void
    {
        $this->constant = $constant;
    }

    /**
     * @return mixed
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param $min
     */
    public function setMin($min): void
    {
        $this->min = $min;
    }

    /**
     * @return mixed
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param $max
     */
    public function setMax($max): void
    {
        $this->max = $max;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     */
    public function setDirection(string $direction): void
    {
        $this->direction = $direction;
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
    public function setService(FeeService $service): void
    {
        $this->service = $service;
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
    public function setPaymentSystem(?FeePaymentSystem $paymentSystem): void
    {
        $this->paymentSystem = $paymentSystem;
    }

    /**
     * @return \ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee\FeeCurrency
     */
    public function getCurrency(): \ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee\FeeCurrency
    {
        return $this->currency;
    }

    /**
     * @param ?FeeCurrency $currency
     */
    public function setCurrency(?FeeCurrency $currency): void
    {
        $this->currency = $currency;
    }

}