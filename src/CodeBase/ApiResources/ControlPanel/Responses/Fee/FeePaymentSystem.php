<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee;

use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class FeePaymentSystem
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee
 */
class FeePaymentSystem implements ResponseEntityInterface
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
     */
    public function setTag(string $tag): void
    {
        $this->tag = $tag;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $subName
     */
    public function setSubName(string $subName): void
    {
        $this->subName = $subName;
    }
}