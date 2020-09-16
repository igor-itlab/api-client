<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;


/**
 * Class Rate
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Rate extends ApiResource
{
    /**
     * @param int $id
     * @return mixed|void
     */
    public function getById(int $id)
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'rates/' . $id;

        return $this->request();
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'rates';

        return $this->request();
    }
}
