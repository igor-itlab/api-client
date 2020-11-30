<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee;

use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee\BaseFee;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class getAll
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee
 */
class getAll implements ResponseEntityInterface
{
    /**
     * @var string
     * @Assert\NotNull
     */
    private $id;

    /**
     * @var BaseFee
     */
    protected BaseFee $baseFee;

    /**
     * @Assert\PositiveOrZero()
     */
    protected $percent;
    /**
     * @Assert\PositiveOrZero()
     */
    protected $constant;
    /**
     * @Assert\PositiveOrZero()
     */
    protected $min;
    /**
     * @Assert\PositiveOrZero()
     */
    protected $max;


    /**
     * @return BaseFee
     */
    public function getBaseFee(): BaseFee
    {
        return $this->baseFee;
    }

    /**
     * @param BaseFee $baseFee
     * @return $this
     */
    public function setBaseFee(?BaseFee $baseFee)
    {
        $this->baseFee = $baseFee;

        return $this;
    }


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
     * @return mixed
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * @param $percent
     */
    public function setPercent($percent): void
    {
        $this->percent = $percent;
    }

    /**
     * @return mixed
     */
    public function getConstant()
    {
        return $this->constant;
    }

    /**
     * @param $constant
     */
    public function setConstant($constant): void
    {
        $this->constant = $constant;
    }

    /**
     * @return mixed
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param $min
     */
    public function setMin($min): void
    {
        $this->min = $min;
    }

    /**
     * @return mixed
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param $max
     */
    public function setMax($max): void
    {
        $this->max = $max;
    }
}
