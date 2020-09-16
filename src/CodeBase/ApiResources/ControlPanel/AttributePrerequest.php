<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

/**
 * Class AttributePrerequest
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class AttributePrerequest extends ApiResource
{

    /**
     * @param int $id
     * @return mixed|void
     */
    public function getById(int $id)
    {
        $this->auth(static::$TYPE_PRIVATE);

        $this->uri = 'attribute_prerequests/' . $id;

        return $this->request();
    }
}
