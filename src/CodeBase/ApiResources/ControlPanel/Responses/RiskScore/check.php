<?php

namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\RiskScore;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;

/**
 * Class check
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\RiskScore
 */
class check implements ResponseEntityInterface
{

    /**
     * @var string
     */
    protected $asset;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var string
     */
    protected $txhash;

    /**
     * @var string
     */
    protected $connection;

    /**
     * @var ?array
     * @Assert\Json()
     */
    protected $attributes;

    /**
     * @var string
     * @Assert\Url()
     */
    protected $callUrl;

    /**
     * @return string
     */
    public function getAsset(): string
    {
        return $this->asset;
    }

    /**
     * @param string $asset
     */
    public function setAsset(string $asset): void
    {
        $this->asset = $asset;
    }

    /**
     * @return string
     */
    public function getCallUrl(): string
    {
        return $this->callUrl;
    }

    /**
     * @param string $callUrl
     */
    public function setCallUrl(string $callUrl): void
    {
        $this->callUrl = $callUrl;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param mixed $attributes
     */
    public function setAttributes($attributes): void
    {
        $this->attributes = $attributes;
    }

    /**
     * @return string
     */
    public function getConnection(): string
    {
        return $this->connection;
    }

    /**
     * @param string $connection
     */
    public function setConnection(string $connection): void
    {
        $this->connection = $connection;
    }

    /**
     * @return string
     */
    public function getTxhash(): string
    {
        return $this->txhash;
    }

    /**
     * @param string $txhash
     */
    public function setTxhash(string $txhash): void
    {
        $this->txhash = $txhash;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

}