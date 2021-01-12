<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payout;

use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payout\External\ExternalNetworks;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payout\External\MiccCity;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;

/**
 * Class external
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payout
 */
class external implements ResponseEntityInterface
{

    /**
     * @var ExternalNetworks[] $data
     */
    protected array $data;

    /**
     * @var MiccCity[] $fetchingCities
     */
    protected array $fetchingCities;

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return external
     */
    public function setData(array $data): external
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return MiccCity[]
     */
    public function getFetchingCities(): array
    {
        return $this->fetchingCities;
    }

    /**
     * @param MiccCity[] $fetchingCities
     *
     * @return external
     */
    public function setFetchingCities(array $fetchingCities): external
    {
        $this->fetchingCities = $fetchingCities;

        return $this;
    }
}
