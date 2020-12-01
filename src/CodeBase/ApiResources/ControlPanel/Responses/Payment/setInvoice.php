<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment;

use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class setInvoice
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment
 */
class setInvoice implements ResponseEntityInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $processingId;

    /**
     * @var PaymentPaymentSystem
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
     * @var PaymentCurrency
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
     * @var PaymentConnection
     */
    protected $connection;
    /**
     * @var ?array
     */
    protected $attributes;

    /**
     * @var string
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
     * @param PaymentConnection $connection
     * @return setInvoice
     */
    public function setConnection(PaymentConnection $connection): setInvoice
    {
        $this->connection = $connection;

        return $this;
    }

    /**
     * @return PaymentConnection
     */
    public function getConnection(): PaymentConnection
    {
        return $this->connection;
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
     * @param PaymentPaymentSystem $paymentSystem
     * @return setInvoice
     */
    public function setPaymentSystem(PaymentPaymentSystem $paymentSystem): setInvoice
    {
        $this->paymentSystem = $paymentSystem;

        return $this;
    }

    /**
     * @return PaymentPaymentSystem
     */
    public function getPaymentSystem(): PaymentPaymentSystem
    {
        return $this->paymentSystem;
    }

    /**
     * @param PaymentCurrency $currency
     * @return setInvoice
     */
    public function setCurrency(PaymentCurrency $currency): setInvoice
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return PaymentCurrency
     */
    public function getCurrency(): PaymentCurrency
    {
        return $this->currency;
    }

    /**
     * @param mixed $processedAmount
     * @return setInvoice
     */
    public function setProcessedAmount($processedAmount)
    {
        $this->processedAmount = $processedAmount;

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
     * @param string $status
     * @return setInvoice
     */
    public function setStatus(string $status): setInvoice
    {
        $this->status = $status;

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
     * @param array $flowData
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
     * @return mixed
     */
    public function getFlowData()
    {
        return $this->flowData;
    }

    /**
     * @param string $processingId
     * @return setInvoice
     */
    public function setProcessingId(string $processingId): setInvoice
    {
        $this->processingId = $processingId;

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
     * @param string $id
     * @return setInvoice
     */
    public function setId(string $id): setInvoice
    {
        $this->id = $id;

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
     * @param string|null $callBackUrl
     *
     * @return setInvoice
     */
    public function setCallBackUrl(?string $callBackUrl): setInvoice
    {
        $this->callBackUrl = $callBackUrl;

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
     * @param string|null $returnUrl
     *
     * @return setInvoice
     */
    public function setReturnUrl(?string $returnUrl): setInvoice
    {
        $this->returnUrl = $returnUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReturnUrl(): ?string
    {
        return $this->returnUrl;
    }
}
