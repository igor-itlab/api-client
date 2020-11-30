<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources;

use ItlabStudio\ApiClient\CodeBase\Proxy\ResponseProxy;

/**
 * Class AbstractMapper
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources
 */
class AbstractMapper
{
    protected $data;

    /**
     * AbstractMapper constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @param $method
     * @param $data
     *
     * @return mixed
     */
    protected function buildRelations($method, $data)
    {
        if (is_array($data) && $relations = $this->checkMethodRelations($method)) {
            foreach ($data as $key => $item) {
                if (is_string($key) && $this->checkRelations($method, $key)) {
                    $data[$key] = (new ResponseProxy(
                        $item,
                        $relations[$key]['mapper'],
                        '', //$relations[$key]['entity'],
                        $method
                    ))->mapResponse();
                } elseif (is_numeric($key) && is_array($item)) {
                    $data[$key] = $this->buildRelations($method, $item);
                }
            }
        }

        return $data;
    }

    /**
     * @param $method
     * @param $property
     * @return bool
     */
    protected function checkRelations($method, $property)
    {
        return $this->relations()[$method][$property] ?? false;
    }

    /**
     * @param $method
     * @return bool
     */
    protected function checkMethodRelations($method)
    {
        return $this->relations()[$method] ?? false;
    }
}