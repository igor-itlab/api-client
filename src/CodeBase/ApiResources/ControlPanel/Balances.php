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
    public function getById($id)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/balances/' . $id)
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
    public function getByCurrency(string $currency)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/balances')
                 ->withQueryParam('currency.asset', strtolower($currency))
        );
    }

    public function getByConnection(string $currency, string $connection)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/balances')
                ->withQueryParam('currency.asset', strtolower($currency))
                ->withQueryParam('service.connections', $connection)
        );
    }
}
