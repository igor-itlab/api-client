<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;


/**
 * Class Balances
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Balances extends ApiResource
{
    /**
     * @param int $id
     *
     * @return mixed|void
     */
    public function getById(int $id)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/balances/' . $id)
        );
    }

    /**
     * @param string $currency
     *
     * @return mixed|void
     */
    public function getByCurrency(string $currency)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/balances')
                 ->withQueryParam('currency', strtolower($currency))
        );
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/balances')
        );
    }

    /**
     * @param string $currency
     *
     * @return mixed
     */
    public function getByAbbr(string $currency)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/balances')
                 ->withQueryParam('currency.asset', strtolower($currency))
        );
    }
}
