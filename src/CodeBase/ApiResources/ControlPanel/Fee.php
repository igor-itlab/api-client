<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;


/**
 * Class Fee
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Fee extends ApiResource
{
    /**
     * @param int $id
     * @return mixed|void
     */
    public function getById(int $id)
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'fees/' . $id;

        return $this->request();
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'fees';

        return $this->request();
    }
}
