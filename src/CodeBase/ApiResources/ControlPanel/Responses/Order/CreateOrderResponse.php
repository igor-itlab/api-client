<?php


namespace App\ApiClient\ApiResources\Huobi\Response\Order;


use App\ApiClient\Interfaces\ResponseEntityInterface;
use Symfony\Component\Validator\Constraints as Assert;

class CreateOrderResponse implements ResponseEntityInterface
{
    /**
     * @var string
     * @Assert\NotNull()
     */
    private $data;

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     * @return CreateOrderResponse
     */
    public function setData(string $data): CreateOrderResponse
    {
        $this->data = $data;

        return $this;
    }
}
