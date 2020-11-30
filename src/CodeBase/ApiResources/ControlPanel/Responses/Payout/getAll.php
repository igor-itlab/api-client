<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payout;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class getAll
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payout
 */
class getAll implements ResponseEntityInterface
{
    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $id;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $processingId;

    /**
     * @var array
     * @Assert\NotNull()
     */
    protected $paymentSystem;

    /**
     * @Assert\PositiveOrZero()
     */
    protected $amount;

    /**
     * @var array
     * @Assert\NotNull()
     */
    protected $currency;

    /**
     * @var int
     * @Assert\PositiveOrZero()
     */
    protected $createDate;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $referenceId;

    /**
     * @Assert\PositiveOrZero()
     */
    protected $paidAmount;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $status;

    /**
     * @var ?array
     * @Assert\Json()
     */
    protected $attributes;

    /**
     * @var string
     * @Assert\Url()
     */
    protected $callUrl;

    /**
     * @var ?array
     */
    protected $info;

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
     * @return string
     */
    public function getProcessingId(): string
    {
        return $this->processingId;
    }

    /**
     * @param string $processingId
     */
    public function setProcessingId(string $processingId): void
    {
        $this->processingId = $processingId;
    }

    /**
     * @return array
     */
    public function getPaymentSystem(): array
    {
        return $this->paymentSystem;
    }

    /**
     * @param array $paymentSystem
     */
    public function setPaymentSystem(array $paymentSystem): void
    {
        $this->paymentSystem = $paymentSystem;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return array
     */
    public function getCurrency(): array
    {
        return $this->currency;
    }

    /**
     * @param array $currency
     */
    public function setCurrency(array $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function getCreateDate(): int
    {
        return $this->createDate;
    }

    /**
     * @param int $createDate
     */
    public function setCreateDate(int $createDate): void
    {
        $this->createDate = $createDate;
    }

    /**
     * @return string
     */
    public function getReferenceId(): string
    {
        return $this->referenceId;
    }

    /**
     * @param string $referenceId
     */
    public function setReferenceId(string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * @return mixed
     */
    public function getPaidAmount()
    {
        return $this->paidAmount;
    }

    /**
     * @param mixed $paidAmount
     */
    public function setPaidAmount($paidAmount): void
    {
        $this->paidAmount = $paidAmount;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return ?array
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @param ?array $attributes
     */
    public function setAttributes(?array $attributes): void
    {
        $this->attributes = $attributes;
    }

    /**
     * @return string
     */
    public function getCallUrl(): string
    {
        return $this->callUrl;
    }

    /**
     * @param string $callUrl
     */
    public function setCallUrl(string $callUrl): void
    {
        $this->callUrl = $callUrl;
    }

    /**
     * @return ?array
     */
    public function getInfo(): ?array
    {
        return $this->info;
    }

    /**
     * @param ?array $info
     */
    public function setInfo(?array $info): void
    {
        $this->info = $info;
    }

}