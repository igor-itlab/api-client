<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Service;

/**
 * Class InvoiceService
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel\Service
 */
class AttributeService
{
    /**
     * convert attributes
     * from
     *      ['attributeName'=>'attributeValue']
     * to
     *      [['name'=>'attributeName', 'value'=>'attributeValue']]
     *
     * @param $body
     *
     * @return mixed
     */
    public static function convertAttributesToNamed(&$body)
    {
        if (isset($body['attributes']) && is_array($body['attributes'])) {
            $substitute = [];
            foreach ($body['attributes'] as $key => $item) {
                $substitute[] = ['name' => $key, 'value' => $item];
            }
            $body['attributes'] = $substitute;
        }
    }
}