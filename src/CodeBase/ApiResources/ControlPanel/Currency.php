<?php

namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

/**
 * Class Currencies
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Currency extends ApiResource
{
    static $TYPE_CRYPTO = 'CRYPTO';
    static $TYPE_FIAT   = 'CURRENCY';

    /**
     * @param int $id
     *
     * @return mixed|void
     * @deprecated Will be removed soon. Please use asset filter with getAll() method
     *
     */
    public function getById($id)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/currencies/' . $id)
        );
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/currencies')
        );
    }
}
