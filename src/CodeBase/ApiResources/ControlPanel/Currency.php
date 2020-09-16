<?php

namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

/**
 * Class Currencies
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Currency extends ApiResource
{
    static $CURRENCY_TYPE_CRYPTO = 'CRYPT';
    static $CURRENCY_TYPE_FIAT = 'CURRENCY';
    
    /**
     * @param int $id
     * @return mixed|void
     */
    public function getById(int $id)
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'currencies/' . $id;

        return $this->request();
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'currencies';

        return $this->request();
    }
}
