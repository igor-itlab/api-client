<?php

namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment\External;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class MiccCity
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment\External
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
    protected $transliteName;

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
    public function getTransliteName(): ?string
    {
        return $this->transliteName;
    }

    /**
     * @param string|null $transliteName
     *
     * @return MiccCity
     */
    public function setTransliteName(?string $transliteName): MiccCity
    {
        $this->transliteName = $transliteName;

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
