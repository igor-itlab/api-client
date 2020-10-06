<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Fee;


use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

class getAll implements ResponseMapperInterface
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
     *
     * @return account
     */
    public function setId(int $id): account
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
     *
     * @return account
     */
    public function setType(string $type): account
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
     *
     * @return account
     */
    public function setSubtype(string $subtype): account
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
     *
     * @return account
     */
    public function setState(string $state): account
    {
        $this->state = $state;

        return $this;
    }
}
