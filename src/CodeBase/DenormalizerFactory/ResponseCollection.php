<?php


namespace ItlabStudio\ApiClient\CodeBase\DenormalizerFactory;


use Doctrine\Common\Collections\ArrayCollection;

class ResponseCollection extends ArrayCollection
{
    public function find(array $options)
    {
        return array_filter($this->toArray(), static function ($item) use ($options){
            $result = true;
            array_walk($options, static function($value, $key) use ($item, &$result) {
                $method = 'get'.ucfirst($key);
                if (!method_exists($item,$method)){
                    return;
                }
                 $result = $result && $item->$method() === $value;
            });
            return $result;
        });
    }
}
