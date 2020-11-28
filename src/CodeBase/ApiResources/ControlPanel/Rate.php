<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;


/**
 * Class Rate
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Rate extends ApiResource
{
    /**
     * @param int $id
     *
     * @return mixed|void
     */
    public function getById($id)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/rates/' . $id)
        );
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/rates')
        );
    }
}
