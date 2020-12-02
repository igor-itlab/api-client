<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\RiskScore;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class checkById
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\RiskScore
 */
class checkById implements ResponseEntityInterface
{
    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $id;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $asset;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $address;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $txhash;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $riskScore;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $status;

    /**
     * @var ?array
     */
    protected $attributes;

    /**
     * @var string|null
     */
    protected $callBackUrl;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $connection;

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
     * @return string|null
     */
    public function getCallBackUrl(): ?string
    {
        return $this->callBackUrl;
    }

    /**
     * @param string|null $callBackUrl
     *
     * @return checkById
     */
    public function setCallBackUrl(?string $callBackUrl): checkById
    {
        $this->callBackUrl = $callBackUrl;

        return $this;
    }
}
