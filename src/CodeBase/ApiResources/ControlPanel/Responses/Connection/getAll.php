<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Connection;


use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\PaymentSystem;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee\FeeCurrency;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class getAll
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Connection
 */
class getAll implements ResponseEntityInterface
{
    /**
     * @var string
     * @Assert\NotNull
     */
    protected $id;

    /**
     * @var int
     */
    protected $createDate;

    /**
     * @var ConnectionService
     * @Assert\Valid()
     */
    protected $service;

    /**
     * @var boolean
     */
    protected $enable;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }


    /**
     * @return ConnectionService
     */
    public function getService(): ConnectionService
    {
        return $this->service;
    }

    /**
     * @param ConnectionService $service
     */
    public function setService(ConnectionService $service): void
    {
        $this->service = $service;
    }

    /**
     * @return bool
     */
    public function isEnable(): bool
    {
        return $this->enable;
    }

    /**
     * @param bool $enable
     */
    public function setEnable(bool $enable): void
    {
        $this->enable = $enable;
    }

    /**
     * @return int
     */
    public function getCreateDate(): int
    {
        return $this->createDate;
    }

    /**
     * @param int $createDate
     */
    public function setCreateDate(int $createDate): void
    {
        $this->createDate = $createDate;
    }

}
