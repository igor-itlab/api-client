<?php


namespace App\ApiClient\ApiResources\Huobi\Response\Order;


use App\ApiClient\Interfaces\ResponseEntityInterface;

class DetailsOrderResponse implements ResponseEntityInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $symbol;

    /**
     * @var int
     */
    private $accountId;

    /**
     * @var string
     */
    private $amount;

    /**
     * @var string
     */
    private $price;

    /**
     * @var int
     */
    private $createdAt;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $fieldAmount;

    /**
     * @var string
     */
    private $fieldCashAmount;

    /**
     * @var string
     */
    private $fieldFees;

    /**
     * @var int
     */
    private $finishedAt;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $source;

    /**
     * @var string
     */
    private $state;

    /**
     * @var int
     */
    private $canceledAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return DetailsOrderResponse
     */
    public function setId(int $id): DetailsOrderResponse
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     * @return DetailsOrderResponse
     */
    public function setSymbol(string $symbol): DetailsOrderResponse
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * @return int
     */
    public function getAccountId(): int
    {
        return $this->accountId;
    }

    /**
     * @param int $accountId
     * @return DetailsOrderResponse
     */
    public function setAccountId(int $accountId): DetailsOrderResponse
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     * @return DetailsOrderResponse
     */
    public function setAmount(string $amount): DetailsOrderResponse
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $price
     * @return DetailsOrderResponse
     */
    public function setPrice(string $price): DetailsOrderResponse
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     * @return DetailsOrderResponse
     */
    public function setCreatedAt(int $createdAt): DetailsOrderResponse
    {
        $this->createdAt = $createdAt;

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
     * @return DetailsOrderResponse
     */
    public function setType(string $type): DetailsOrderResponse
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getFieldAmount(): string
    {
        return $this->fieldAmount;
    }

    /**
     * @param string $fieldAmount
     * @return DetailsOrderResponse
     */
    public function setFieldAmount(string $fieldAmount): DetailsOrderResponse
    {
        $this->fieldAmount = $fieldAmount;

        return $this;
    }

    /**
     * @return string
     */
    public function getFieldCashAmount(): string
    {
        return $this->fieldCashAmount;
    }

    /**
     * @param string $fieldCashAmount
     * @return DetailsOrderResponse
     */
    public function setFieldCashAmount(string $fieldCashAmount): DetailsOrderResponse
    {
        $this->fieldCashAmount = $fieldCashAmount;

        return $this;
    }

    /**
     * @return string
     */
    public function getFieldFees(): string
    {
        return $this->fieldFees;
    }

    /**
     * @param string $fieldFees
     * @return DetailsOrderResponse
     */
    public function setFieldFees(string $fieldFees): DetailsOrderResponse
    {
        $this->fieldFees = $fieldFees;

        return $this;
    }

    /**
     * @return int
     */
    public function getFinishedAt(): int
    {
        return $this->finishedAt;
    }

    /**
     * @param int $finishedAt
     * @return DetailsOrderResponse
     */
    public function setFinishedAt(int $finishedAt): DetailsOrderResponse
    {
        $this->finishedAt = $finishedAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return DetailsOrderResponse
     */
    public function setUserId(int $userId): DetailsOrderResponse
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return DetailsOrderResponse
     */
    public function setSource(string $source): DetailsOrderResponse
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return DetailsOrderResponse
     */
    public function setState(string $state): DetailsOrderResponse
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return int
     */
    public function getCanceledAt(): int
    {
        return $this->canceledAt;
    }

    /**
     * @param int $canceledAt
     * @return DetailsOrderResponse
     */
    public function setCanceledAt(int $canceledAt): DetailsOrderResponse
    {
        $this->canceledAt = $canceledAt;

        return $this;
    }
}
