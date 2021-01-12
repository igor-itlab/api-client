<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment\External;


use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment\external;

/**
 * Class ExternalNetworks
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment\External
 */
class ExternalNetworks
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
    public function setNetwork(MiccNetwork $network): ExternalNetworks
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
    public function setCities(array $cities): ExternalNetworks
    {
        $this->cities = $cities;

        return $this;
    }
}
