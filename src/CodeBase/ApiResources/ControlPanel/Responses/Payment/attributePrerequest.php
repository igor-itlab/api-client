<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class attributePrerequest
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\PaymentSystem
 */
class attributePrerequest implements ResponseEntityInterface
{
    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @var string
     */
    protected $regex;

    /**
     * @var string
     */
    protected $fieldType;

    /**
     * @var string
     */
    protected $locale;
    /**
     * @var string
     */
    protected $title;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return attributePrerequest
     */
    public function setName(string $name): attributePrerequest
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegex(): string
    {
        return $this->regex;
    }

    /**
     * @param string $regex
     *
     * @return attributePrerequest
     */
    public function setRegex(string $regex): attributePrerequest
    {
        $this->regex = $regex;

        return $this;
    }

    /**
     * @return string
     */
    public function getFieldType(): string
    {
        return $this->fieldType;
    }

    /**
     * @param string $fieldType
     *
     * @return attributePrerequest
     */
    public function setFieldType(string $fieldType): attributePrerequest
    {
        $this->fieldType = $fieldType;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     *
     * @return attributePrerequest
     */
    public function setLocale(string $locale): attributePrerequest
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return attributePrerequest
     */
    public function setTitle(string $title): attributePrerequest
    {
        $this->title = $title;

        return $this;
    }
}
