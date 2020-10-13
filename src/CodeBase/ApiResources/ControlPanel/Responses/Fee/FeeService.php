<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class FeeService
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee
 */
class FeeService implements ResponseEntityInterface
{
    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $title;

    /**
     * @var array
     */
    protected $fields;

    /**
     * @var boolean
     */
    protected $enable;

    /**
     * @var array
     */
    protected $support = [];

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param array $fields
     */
    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }

    /**
     * @param bool $enable
     */
    public function setEnable(bool $enable): void
    {
        $this->enable = $enable;
    }

    /**
     * @param array $support
     */
    public function setSupport(array $support): void
    {
        $this->support = $support;
    }

}