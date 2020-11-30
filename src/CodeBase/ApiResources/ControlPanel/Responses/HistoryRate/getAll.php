<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\HistoryRate;


use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\PaymentSystem;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee\FeeCurrency;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class getAll
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\HistoryRate
 */
class getAll implements ResponseEntityInterface
{
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
     * @Assert\PositiveOrZero()
     */
    protected $date;

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
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param $ratedate
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

}