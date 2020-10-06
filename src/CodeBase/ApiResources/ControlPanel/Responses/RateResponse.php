<?php


namespace App\ApiClient\ApiResources\Huobi\Response;


use App\ApiClient\Interfaces\ResponseEntityInterface;

class RateResponse implements ResponseEntityInterface
{
    /**
     * @var float
     */
    private $open;

    /**
     * @var float
     */
    private $close;

    /**
     * @var float
     */
    private $high;

    /**
     * @return float
     */
    public function getOpen(): float
    {
        return $this->open;
    }

    /**
     * @param float $open
     * @return RateResponse
     */
    public function setOpen(float $open): RateResponse
    {
        $this->open = $open;

        return $this;
    }

    /**
     * @return float
     */
    public function getClose(): float
    {
        return $this->close;
    }

    /**
     * @param float $close
     * @return RateResponse
     */
    public function setClose(float $close): RateResponse
    {
        $this->close = $close;

        return $this;
    }

    /**
     * @return float
     */
    public function getHigh(): float
    {
        return $this->high;
    }

    /**
     * @param float $high
     * @return RateResponse
     */
    public function setHigh(float $high): RateResponse
    {
        $this->high = $high;

        return $this;
    }
}
