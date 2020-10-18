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
     * @var string
     * @Assert\NotNull()
     */
    protected $applicantId;

    /**
     * @var string
     * @Assert\NotNull()
     */
    protected $accessToken;

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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getApplicantId(): string
    {
        return $this->applicantId;
    }

    /**
     * @param string $applicantId
     */
    public function setApplicantId(string $applicantId): void
    {
        $this->applicantId = $applicantId;
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
     */
    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = $accessToken;
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