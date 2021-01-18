<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment\External;

use Symfony\Component\Validator\Constraints as Assert;
/**
 * Class MiccCashiers
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Responses\Payment\External
 */
class MiccCashier
{

    /**
     * @Assert\NotNull()
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $firstname;

    /**
     * @var string|null
     */
    protected $lastname;

    /**
     * @var string|null
     */
    protected $email;

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     *
     * @return MiccCashier
     */
    public function setFirstname(?string $firstname): MiccCashier
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     *
     * @return MiccCashier
     */
    public function setLastname(?string $lastname): MiccCashier
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     *
     * @return MiccCashier
     */
    public function setEmail(?string $email): MiccCashier
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return MiccCashier
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
