<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

/**
 * Class Connection
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Connection extends ApiResource
{
    /**
     * @param int $id
     *
     * @return mixed|void
     */
    public function getById($id)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/connections/' . $id)
        );
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/connections')
        );
    }
}
