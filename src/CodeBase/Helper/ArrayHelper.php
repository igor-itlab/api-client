<?php


namespace ItlabStudio\ApiClient\CodeBase\Helper;

/**
 * Class ArrayHelper
 * @package ItlabStudio\ApiClient\CodeBase\Helper
 */
class ArrayHelper
{

    /**
     * @param array $arr
     * @return bool
     */
    public static function isAssoc(array $arr)
    {
        if (array() === $arr) {
            return false;
        }

        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}
