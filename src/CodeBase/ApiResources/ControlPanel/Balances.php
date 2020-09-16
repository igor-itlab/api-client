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
    public function getByCurrency(string $currency)
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->setFilter('currency', strtolower($currency));
        $this->uri = 'balances';

        return $this->request();
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'balances';

        return $this->request();
    }

    /**
     * @param string $currency
     * @return mixed
     */
    public function getByAbbr(string $currency)
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->setFilter('currency.asset', strtolower($currency));
        $this->uri = 'balances';

        return $this->request();
    }
}
