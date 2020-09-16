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
     * @return mixed|void
     */
    public function getById(int $id)
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'exchangers/' . $id;

        return $this->request();
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'exchangers';

        return $this->request();
    }
}
