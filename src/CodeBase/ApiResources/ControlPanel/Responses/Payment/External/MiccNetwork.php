<?php

namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment\External;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class MiccNetwork
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment\External
 */
class MiccNetwork
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
     * @var array|null
     */
    protected $currencies;


    /**
     * @var array|null
     */
    protected $attributes;

    /**
     * @param mixed $id
     * @return MiccNetwork
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string|null $name
     * @return MiccNetwork
     */
    public function setName(?string $name): MiccNetwork
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param array|null $currencies
     * @return MiccNetwork
     */
    public function setCurrencies(?array $currencies): MiccNetwork
    {
        $this->currencies = $currencies;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getCurrencies(): ?array
    {
        return $this->currencies;
    }

    /**
     * @param array|null $attributes
     * @return MiccNetwork
     */
    public function setAttributes(?array $attributes): MiccNetwork
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }
}
