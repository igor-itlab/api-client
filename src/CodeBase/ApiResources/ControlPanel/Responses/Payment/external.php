<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment;


use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment\External\MiccCities;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment\External\MiccNetwork;

/**
 * Class external
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment
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
     * @param MiccNetwork $network
     * @return external
     */
    public function setNetwork(MiccNetwork $network): external
    {
        $this->network = $network;

        return $this;
    }

    /**
     * @return MiccNetwork
     */
    public function getNetwork(): MiccNetwork
    {
        return $this->network;
    }

    /**
     * @param MiccCities[] $cities
     * @return external
     */
    public function setCities(array $cities): external
    {
        $this->cities = $cities;

        return $this;
    }

    /**
     * @return MiccCities[]
     */
    public function getCities(): array
    {
        return $this->cities;
    }
}
