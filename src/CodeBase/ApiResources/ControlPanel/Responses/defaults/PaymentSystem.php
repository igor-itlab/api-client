<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\defaults;

use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class FeePaymentSystem
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee
 */
class PaymentSystem implements ResponseEntityInterface
{
    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $tag;
    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $name;
    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $subName;

    /**
     * @param string $tag
     * @return $this
     */
    public function setTag(string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $subName
     * @return $this
     */
    public function setSubName(string $subName): self
    {
        $this->subName = $subName;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * @return string
     */
    public function getSubName(): string
    {
        return $this->subName;
    }
}
