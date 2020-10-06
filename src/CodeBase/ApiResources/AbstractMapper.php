<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources;


use ItlabStudio\ApiClient\CodeBase\DenormalizerFactory\ResponseCollection;
use ItlabStudio\ApiClient\CodeBase\Interfaces\ResponseMapperInterface;
use ItlabStudio\ApiClient\CodeBase\Proxy\ResponseProxy;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use phpDocumentor\Reflection\Utils;

class AbstractMapper
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

//    public function mapMethod(&$item, $key, $prefix)
//    {
//        $item = "$prefix: $item1";
//    }
    public function single()
    {
        $this->buildRelations($method, $data);
    }

    protected function buildRelations($method, $data)
    {

        if (is_array($data)) {
            $response = new ResponseCollection();
            foreach ($data as $key => &$item) {

                if (is_string($key) /*&& is_array($item)*/) {
                    if ($relations = $this->checkRelations($key)) {
                        $response->set($key, (new ResponseProxy(
                            $item,
                            $relations['mapper'],
                            $relations['entity'],
                            $relations['method']
                        ))->mapResponse());
                    } else {
                        $response->set($key, $item);
                    }
//                    $response->set($key, array_walk($data, 'mapMethod'));
//                    $response->add($this->buildRelation(__METHOD__, $item));
                } elseif (is_numeric($key) && is_array($item)) {
                    $response->set($key, $this->buildRelations($method, $item));
                }
            }

            return $response;
        }

        return $data;

    }

    protected function checkRelations($property)
    {

        return $this->relations()[$property] ?? false;
    }
}