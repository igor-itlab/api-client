<?php

namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Balances;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class getById
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Balances
 */
class getById implements ResponseEntityInterface
{
    /**
     * @var string
     * @Assert\NotNull
     */
    protected $id;

    /**
     * @Assert\PositiveOrZero()
     */
    protected $amount;

    /**
     * @var string
     * @Assert\NotNull
     */
    protected $serviceName;

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
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getServiceName(): string
    {
        return $this->serviceName;
    }

    /**
     * @param string $serviceName
     */
    public function setServiceName(string $serviceName): void
    {
        $this->serviceName = $serviceName;
    }


}