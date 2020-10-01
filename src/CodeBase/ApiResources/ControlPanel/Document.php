<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

use ItlabStudio\ApiClient\CodeBase\Builders\RequestBuilder;

/**
 * Class Document
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Document extends ApiResource
{
    /**
     * @param int $id
     *
     * @return mixed|void
     */
    public function getById(int $id)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/documents/' . $id)
        );
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/documents')
        );
    }

    /**
     *  [
     *       "email"      => $email,
     *       "connection" => $connection,
     *       "attributes" => $attributes,
     *       "callUrl"    => $callUrl,
     *   ]
     *
     * @param array $body
     *
     * @return mixed
     */
    public function verify(array $body = [])
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/documents')
                 ->withMethod(RequestBuilder::$METHOD_POST)
        );
    }
}
