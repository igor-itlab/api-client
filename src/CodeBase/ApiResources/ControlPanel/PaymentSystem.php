<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;


/**
 * Class PaymentSystem
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class PaymentSystem extends ApiResource
{
    /**
     * @param int $id
     * @return mixed|void
     */
    public function getById(int $id)
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'payment_systems/' . $id;

        return $this->request();
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'payment_systems';

        return $this->request();
    }
}
