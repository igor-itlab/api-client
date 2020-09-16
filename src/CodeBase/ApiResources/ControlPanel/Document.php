<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

/**
 * Class Document
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Document extends ApiResource
{
    /**
     * @param int $id
     * @return mixed|void
     */
    public function getById(int $id)
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'documents/' . $id;

        return $this->request();
    }

    public function getAll()
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'documents';

        return $this->request();
    }

    /**
     *  [
     *       "email"      => $email,
     *       "connection" => $connection,
     *       "attributes" => $attributes,
     *       "callUrl"    => $callUrl,
     *   ]
     *
     * @return mixed
     */
    public function verify(array $body = []){
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'documents';
        $this->method = static::$METHOD_POST;

        return $this->request();
    }
}
