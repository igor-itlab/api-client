<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;


/**
 * Class Exchanger
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Exchanger extends ApiResource
{
    /**
     * @param int $id
     *
     * @return mixed|void
     */
    public function getById(int $id)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/exchangers/' . $id)
        );
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/exchangers')
        );
    }
}
