<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Currency;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;

/**
 * Class Currency
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Currency
 */
class Currency implements ResponseEntityInterface
{
    /**
     * @var string
     */
    protected $asset;
    /**
     * @var string
     */
    protected $type;

    /**
     * @param string $asset
     */
    public function setAsset(string $asset): void
    {
        $this->asset = $asset;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }


}