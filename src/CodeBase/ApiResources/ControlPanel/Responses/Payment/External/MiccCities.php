<?php

namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment\External;


/**
 * Class MiccCities
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment\External
 */
class MiccCities
{
    /**
     * @var MiccCity
     */
    protected MiccCity $city;

    /**
     * @var MiccExchangePoint[]|null $exchangePoints
     */
    protected ?array $exchangePoints;

    /**
     * @var MiccCashier[]|null $cashiers
     */
    protected ?array $cashiers;

    /**
     * @return MiccCity
     */
    public function getCity(): MiccCity
    {
        return $this->city;
    }

    /**
     * @param MiccCity $city
     *
     * @return MiccCities
     */
    public function setCity(MiccCity $city): MiccCities
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return MiccExchangePoint[]|null
     */
    public function getExchangePoints(): ?array
    {
        return $this->exchangePoints;
    }

    /**
     * @param MiccExchangePoint[]|null $exchangePoints
     *
     * @return MiccCities
     */
    public function setExchangePoints(?array $exchangePoints): MiccCities
    {
        $this->exchangePoints = $exchangePoints;

        return $this;
    }

    /**
     * @return MiccCashiers[]|null
     */
    public function getCashiers(): ?array
    {
        return $this->cashiers;
    }

    /**
     * @param MiccCashiers[]|null $cashiers
     *
     * @return MiccCities
     */
    public function setCashiers(?array $cashiers): MiccCities
    {
        $this->cashiers = $cashiers;

        return $this;
    }
}
