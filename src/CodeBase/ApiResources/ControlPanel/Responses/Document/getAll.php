<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Document;


use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\PaymentSystem;
use ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee\FeeCurrency;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class getAll
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Document
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
     * @Assert\Email()
     */
    protected $email;

    /**
     * @var string|null
     */
    protected $applicantId;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $accessToken;

    /**
     * @var string|null
     */
    protected $flow;

    /**
     * @var ?array
     */
    protected $attributes;

    /**
     * @var string
     */
    protected $callBackUrl;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $status;

    /**
     * @var VerifyConnection $connection
     */
    protected $connection;

    /**
     * @var array
     */
    protected $flowData;

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
     * @return getAll
     */
    public function setId(string $id): getAll
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return getAll
     */
    public function setEmail(string $email): getAll
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     *
     * @return getAll
     */
    public function setAccessToken(string $accessToken): getAll
    {
        $this->accessToken = $accessToken;

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
     *
     * @return getAll
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallBackUrl(): string
    {
        return $this->callBackUrl;
    }

    /**
     * @param string $callBackUrl
     *
     * @return getAll
     */
    public function setCallBackUrl(string $callBackUrl): getAll
    {
        $this->callBackUrl = $callBackUrl;

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
     * @return getAll
     */
    public function setStatus(string $status): getAll
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return VerifyConnection
     */
    public function getConnection(): VerifyConnection
    {
        return $this->connection;
    }

    /**
     * @param VerifyConnection $connection
     *
     * @return getAll
     */
    public function setConnection(VerifyConnection $connection): getAll
    {
        $this->connection = $connection;

        return $this;
    }

    /**
     * @return array
     */
    public function getFlowData(): array
    {
        return $this->flowData;
    }

    /**
     * @param array $flowData
     *
     * @return getAll
     */
    public function setFlowData(array $flowData): getAll
    {
        foreach ($flowData as $item) {
            $this->flowData[$item['name']] = $item['value'];
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getApplicantId(): ?string
    {
        return $this->applicantId;
    }

    /**
     * @param string|null $applicantId
     *
     * @return getAll
     */
    public function setApplicantId(?string $applicantId): getAll
    {
        $this->applicantId = $applicantId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFlow(): ?string
    {
        return $this->flow;
    }

    /**
     * @param string|null $flow
     *
     * @return getAll
     */
    public function setFlow(?string $flow): getAll
    {
        $this->flow = $flow;

        return $this;
    }
}
