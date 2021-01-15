<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;

/**
 * Class verification
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment
 */
class verification implements ResponseEntityInterface
{

    /**
     * @var string|null
     */
    protected $flow;

    /**
     * @return string|null
     */
    public function getFlow(): ?string
    {
        return $this->flow;
    }

    /**
     * @param string|null $flow
     */
    public function setFlow(?string $flow)
    {
        $this->flow = $flow;

        return $this;
    }
}
