<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;

/**
 * Class PaymentConnection
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment
 */
class PaymentConnection implements ResponseEntityInterface
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
     * @var PaymentService
     */
    protected PaymentService $service;


    /**
     * @param mixed $service
     * @return PaymentConnection
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
     * @return PaymentConnection
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
     * @return PaymentConnection
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
     * @return PaymentConnection
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
