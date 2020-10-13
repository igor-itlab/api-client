<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;


/**
 * Class Fee
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Fee extends ApiResource
{
    /**
     * @param string $id
     *
     * @return mixed|void
     */
    public function getById(string $id)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/fees/' . $id)
        );
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/fees')
        );
    }
}
