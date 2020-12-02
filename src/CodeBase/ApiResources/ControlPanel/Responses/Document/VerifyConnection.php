<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Document;

/**
 * Class VerifyConnection
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Document
 */
class VerifyConnection
{
    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $id;

    /**
     * @var int
     */
    protected $createDate;

    /**
     * @var ConnectionService $service
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
     *
     * @return VerifyConnection
     */
    public function setId(string $id): VerifyConnection
    {
        $this->id = $id;

        return $this;
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
     *
     * @return VerifyConnection
     */
    public function setCreateDate(int $createDate): VerifyConnection
    {
        $this->createDate = $createDate;

        return $this;
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
     *
     * @return VerifyConnection
     */
    public function setService(ConnectionService $service): VerifyConnection
    {
        $this->service = $service;

        return $this;
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
     *
     * @return VerifyConnection
     */
    public function setEnable(bool $enable): VerifyConnection
    {
        $this->enable = $enable;

        return $this;
    }

}