<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;


/**
 * Class Balances
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Balances extends ApiResource
{
    /**
     * @param int $id
     * @return mixed|void
     */
    public function getById(int $id)
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'balances/' . $id;

        return $this->request();
    }

    /**
     * @param string $currency
     * @return mixed|void
     */
    public function getAll(string $currency)
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'balances?currency=' . strtolower($currency);

        return $this->request();
    }

    /**
     * @param string $currency
     * @return mixed
     */
    public function getByAbbr(string $currency)
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'balances?currency.asset=' . strtolower($currency);

        return $this->request();
    }
}
