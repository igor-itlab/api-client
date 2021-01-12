<?php

namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payout\External;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class MiccCity
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payout\External
 */
class MiccCity
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
    protected $translateName;

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
     * @return MiccCity
     */
    public function setName(?string $name): MiccCity
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTranslateName(): ?string
    {
        return $this->translateName;
    }

    /**
     * @param string|null $translateName
     *
     * @return MiccCity
     */
    public function setTranslateName(?string $translateName): MiccCity
    {
        $this->translateName = $translateName;

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
     * @return MiccCity
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
