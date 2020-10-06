<?php


namespace App\ApiClient\ApiResources\Huobi\Response;


use App\ApiClient\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

class BalanceResponse implements ResponseEntityInterface
{
    /**
     * @var string
     * @Assert\NotNull()
     */
    private $currency;

    /**
     * @var string
     * @Assert\NotNull()
     */
    private $type;

    /**
     * @var string
     * @Assert\NotNull()
     */
    private $balance;

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return BalanceResponse
     */
    public function setCurrency(string $currency): BalanceResponse
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return BalanceResponse
     */
    public function setType(string $type): BalanceResponse
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getBalance(): string
    {
        return $this->balance;
    }

    /**
     * @param string $balance
     * @return BalanceResponse
     */
    public function setBalance(string $balance): BalanceResponse
    {
        $this->balance = $balance;

        return $this;
    }
}
