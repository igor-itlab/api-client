<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

/**
 * Class AttributePrerequest
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class AttributePrerequest extends ApiResource
{

    /**
     * @param int $id
     *
     * @return mixed|void
     */
    public function getById(int $id)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/attribute_prerequests/' . $id)
        );
    }
}
