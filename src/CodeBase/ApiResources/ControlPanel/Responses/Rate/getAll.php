<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Rate;

use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class getAll
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Rate
 */
class getAll implements ResponseEntityInterface
{
    /**
     * @var RateCurrency
     */
    protected RateCurrency $currency;

    /**
     * @var RateService
     */
    protected RateService $service;

    /**
     * @Assert\PositiveOrZero()
     */
    protected $rate;

    /**
     * @Assert\PositiveOrZero()
     */
    protected $selling;

    /**
     * @Assert\PositiveOrZero()
     */
    protected $purchase;

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param mixed $rate
     */
    public function setRate($rate): void
    {
        $this->rate = $rate;
    }

    /**
     * @return mixed
     */
    public function getSelling()
    {
        return $this->selling;
    }

    /**
     * @param mixed $selling
     */
    public function setSelling($selling): void
    {
        $this->selling = $selling;
    }

    /**
     * @return mixed
     */
    public function getPurchase()
    {
        return $this->purchase;
    }

    /**
     * @param mixed $purchase
     */
    public function setPurchase($purchase): void
    {
        $this->purchase = $purchase;
    }

    /**
     * @param RateCurrency $currency
     * @return getAll
     */
    public function setCurrency(RateCurrency $currency): getAll
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return RateCurrency
     */
    public function getCurrency(): RateCurrency
    {
        return $this->currency;
    }

    /**
     * @param RateService $service
     * @return getAll
     */
    public function setService(RateService $service): getAll
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @return RateService
     */
    public function getService(): RateService
    {
        return $this->service;
    }
}
