<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources;

use ItlabStudio\ApiClient\CodeBase\DenormalizerFactory\ResponseCollection;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseMapperInterface;
use ItlabStudio\ApiClient\CodeBase\Proxy\ResponseProxy;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use phpDocumentor\Reflection\Utils;

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
     * @return array
     */
    protected function buildRelations($method, $data)
    {

        if (is_array($data)) {
            $response = [];
            foreach ($data as $key => &$item) {

                if (is_string($key) /*&& is_array($item)*/) {
                    if ($relations = $this->checkRelations($key)) {
                        $response[$key] = (new ResponseProxy(
                            $item,
                            $relations['mapper'],
                            $relations['entity'],
                            $relations['method']
                        ))->mapResponse();
                    } else {
                        $response[$key] = $item;
                    }
//                    $response->set($key, array_walk($data, 'mapMethod'));
//                    $response->add($this->buildRelation(__METHOD__, $item));
                } elseif (is_numeric($key) && is_array($item)) {
                    $response[$key] = $this->buildRelations($method, $item);
                }
            }

            return $response;
        }

        return $data;

    }

    /**
     * @param $property
     *
     * @return bool
     */
    protected function checkRelations($property)
    {
        return $this->relations()[$property] ?? false;
    }
}