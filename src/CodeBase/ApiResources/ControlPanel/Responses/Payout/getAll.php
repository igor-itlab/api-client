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
     * @var PayoutPaymentSystem
     */
    protected $paymentSystem;

    /**
     * @Assert\PositiveOrZero()
     */
    protected $amount;

    /**
     * @Assert\PositiveOrZero()
     */
    protected $processedAmount;

    /**
     * @var PayoutCurrency
     */
    protected $currency;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $referenceId;

    /**
     * @var string|null
     */
    protected $returnUrl;

    /**
     * @var PayoutConnection
     */
    protected $connection;
    /**
     * @var ?array
     */
    protected $attributes;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $status;

    /**
     * @var string|null
     */
    protected $callBackUrl;

    /**
     * @var string
     */
    protected $signature;

    /**
     * @var ?array
     */
    protected $flowData;


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
     * @return PayoutConnection
     */
    public function getConnection(): PayoutConnection
    {
        return $this->connection;
    }

    /**
     * @param PayoutConnection $connection
     *
     * @return self
     */
    public function setConnection(PayoutConnection $connection): self
    {
        $this->connection = $connection;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param mixed $attributes
     */
    public function setAttributes($attributes): void
    {
        $this->attributes = $attributes;
    }

    /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     */
    public function setSignature(string $signature): void
    {
        $this->signature = $signature;
    }

    /**
     * @return PayoutPaymentSystem
     */
    public function getPaymentSystem(): PayoutPaymentSystem
    {
        return $this->paymentSystem;
    }

    /**
     * @param PayoutPaymentSystem $paymentSystem
     *
     * @return self
     */
    public function setPaymentSystem(PayoutPaymentSystem $paymentSystem): self
    {
        $this->paymentSystem = $paymentSystem;

        return $this;
    }

    /**
     * @return PayoutCurrency
     */
    public function getCurrency(): PayoutCurrency
    {
        return $this->currency;
    }

    /**
     * @param PayoutCurrency $currency
     *
     * @return self
     */
    public function setCurrency(PayoutCurrency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProcessedAmount()
    {
        return $this->processedAmount;
    }

    /**
     * @param mixed $processedAmount
     *
     * @return self
     */
    public function setProcessedAmount($processedAmount)
    {
        $this->processedAmount = $processedAmount;

        return $this;
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
     *
     * @return self
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFlowData()
    {
        return $this->flowData;
    }

    /**
     * @param array $flowData
     *
     * @return $this
     */
    public function setFlowData(array $flowData)
    {
        foreach ($flowData as $item) {
            $this->flowData[$item['name']] = $item['value'];
        }

        return $this;
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
     *
     * @return self
     */
    public function setProcessingId(string $processingId): self
    {
        $this->processingId = $processingId;

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
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCallBackUrl(): ?string
    {
        return $this->callBackUrl;
    }

    /**
     * @param string|null $callBackUrl
     *
     * @return self
     */
    public function setCallBackUrl(?string $callBackUrl): self
    {
        $this->callBackUrl = $callBackUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReturnUrl(): ?string
    {
        return $this->returnUrl;
    }

    /**
     * @param string|null $returnUrl
     *
     * @return self
     */
    public function setReturnUrl(?string $returnUrl): self
    {
        $this->returnUrl = $returnUrl;

        return $this;
    }
}
