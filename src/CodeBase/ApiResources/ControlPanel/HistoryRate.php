<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

/**
 * Class HistoryRate
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class HistoryRate extends ApiResource
{
    /**
     * @param int $id
     * @return mixed|void
     */
    public function getById(int $id)
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'history_rates/' . $id;

        return $this->request();
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'history_rates';

        return $this->request();
    }
}
