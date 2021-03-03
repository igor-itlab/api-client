<?php

namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payout\External;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class MiccNetwork
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payout\External
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
     * @var string|null
     */
    protected $type;

    /**
     * @var array|null
     */
    protected $currencies;


    /**
     * @var array|null
     */
    protected $attributes;

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
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return array|null
     */
    public function getCurrencies(): ?array
    {
        return $this->currencies;
    }

    /**
     * @param array|null $currencies
     *
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
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @param array|null $attributes
     *
     * @return MiccNetwork
     */
    public function setAttributes(?array $attributes): MiccNetwork
    {
        $this->attributes = $attributes;

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
     * @return MiccNetwork
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
