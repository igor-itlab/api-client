<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payout;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;

/**
 * Class PaymentConnection
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment
 */
class PayoutConnection implements ResponseEntityInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var boolean
     */
    protected $enable;

    /**
     * @param int $createDate
     */
    protected $createDate;

    /**
     * @var PayoutService
     */
    protected PayoutService $service;


    /**
     * @param mixed $service
     * @return PayoutConnection
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param bool $enable
     * @return PayoutConnection
     */
    public function setEnable(bool $enable): self
    {
        $this->enable = $enable;

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
     * @param mixed $createDate
     * @return PayoutConnection
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param string $id
     * @return PayoutConnection
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
