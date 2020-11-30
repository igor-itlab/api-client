<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\RiskScore;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;

/**
 * Class checkById
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\RiskScore
 */
class checkById implements ResponseEntityInterface
{

    /**
     * @var string
     */
    protected $id;
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
    protected $riskScore;

    /**
     * @var string
     */
    protected $status;

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
     * @var ?array
     */
    protected $info;

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

    /**
     * @return string
     */
    public function getRiskScore(): string
    {
        return $this->riskScore;
    }

    /**
     * @param string $riskScore
     */
    public function setRiskScore(string $riskScore): void
    {
        $this->riskScore = $riskScore;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info): void
    {
        $this->info = $info;
    }

}