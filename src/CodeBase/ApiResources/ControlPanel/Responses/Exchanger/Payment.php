<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Exchanger;


use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Payment
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Exchanger
 */
class Payment
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
     * @var string
     * @Assert\NotNull()
     */
    protected $paymentSystem;

    /**
     * @Assert\PositiveOrZero()
     */
    protected $amount;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $currency;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $createDate;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $referenceId;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $links;

    /**
     * @Assert\PositiveOrZero()
     */
    protected $paidAmount;

    /**
     * @var string
     * @Assert\Url()
     */
    protected $returnUrl;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $status;

    /**
     * @var string
     * @Assert\Json()
     */
    protected $attributes;

    /**
     * @var string
     * @Assert\Url()
     */
    protected $callUrl;

    /**
     * @var array
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
     * @return string
     */
    public function getPaymentSystem(): string
    {
        return $this->paymentSystem;
    }

    /**
     * @param string $paymentSystem
     */
    public function setPaymentSystem(string $paymentSystem): void
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
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getCreateDate(): string
    {
        return $this->createDate;
    }

    /**
     * @param string $createDate
     */
    public function setCreateDate(string $createDate): void
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
     * @return string
     */
    public function getLinks(): string
    {
        return $this->links;
    }

    /**
     * @param string $links
     */
    public function setLinks(string $links): void
    {
        $this->links = $links;
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
    public function getReturnUrl(): string
    {
        return $this->returnUrl;
    }

    /**
     * @param string $returnUrl
     */
    public function setReturnUrl(string $returnUrl): void
    {
        $this->returnUrl = $returnUrl;
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
     * @return string
     */
    public function getAttributes(): string
    {
        return $this->attributes;
    }

    /**
     * @param string $attributes
     */
    public function setAttributes(string $attributes): void
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
     * @return array
     */
    public function getInfo(): array
    {
        return $this->info;
    }

    /**
     * @param array $info
     */
    public function setInfo(array $info): void
    {
        $this->info = $info;
    }


}