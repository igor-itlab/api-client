<?php


namespace App\ApiClient\ApiResources\Huobi\Response;


use App\ApiClient\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

class AccountResponse implements ResponseEntityInterface
{
    /**
     * @var int
     * @Assert\NotNull
     */
    private $id;

    /**
     * @var string
     * @Assert\NotNull
     */
    private $type;

    /**
     * @var string
     */
    private $subtype;

    /**
     * @var string
     * @Assert\NotNull
     */
    private $state;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return AccountResponse
     */
    public function setId(int $id): AccountResponse
    {
        $this->id = $id;

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
     * @return AccountResponse
     */
    public function setType(string $type): AccountResponse
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubtype(): string
    {
        return $this->subtype;
    }

    /**
     * @param string $subtype
     * @return AccountResponse
     */
    public function setSubtype(string $subtype): AccountResponse
    {
        $this->subtype = $subtype;

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
     * @return AccountResponse
     */
    public function setState(string $state): AccountResponse
    {
        $this->state = $state;

        return $this;
    }
}
