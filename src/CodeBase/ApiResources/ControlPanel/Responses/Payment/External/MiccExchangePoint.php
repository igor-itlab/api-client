<?php

namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment\External;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class MiccExchangePoint
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment\External
 */
class MiccExchangePoint
{

    /**
     * @Assert\NotNull()
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var string|null
     */
    protected $address;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return MiccExchangePoint
     */
    public function setName(?string $name): MiccExchangePoint
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return MiccExchangePoint
     */
    public function setDescription(?string $description): MiccExchangePoint
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     *
     * @return MiccExchangePoint
     */
    public function setAddress(?string $address): MiccExchangePoint
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return MiccExchangePoint
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
