<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payout;


use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payout\External\MiccCities;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payout\External\MiccNetwork;

/**
 * Class external
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payout
 */
class external implements ResponseEntityInterface
{

    /**
     * @var MiccNetwork
     */
    protected MiccNetwork $network;

    /**
     * @var MiccCities[] $cities
     */
    protected array $cities;

    /**
     * @return MiccNetwork
     */
    public function getNetwork(): MiccNetwork
    {
        return $this->network;
    }

    /**
     * @param MiccNetwork $network
     *
     * @return external
     */
    public function setNetwork(MiccNetwork $network): external
    {
        $this->network = $network;

        return $this;
    }

    /**
     * @return MiccCities[]
     */
    public function getCities(): array
    {
        return $this->cities;
    }

    /**
     * @param MiccCities[] $cities
     *
     * @return external
     */
    public function setCities(array $cities): external
    {
        $this->cities = $cities;

        return $this;
    }
}
