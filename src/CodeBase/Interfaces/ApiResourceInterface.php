<?php

namespace ItlabStudio\ApiClient\CodeBase\Interfaces;

use ItlabStudio\ApiClient\CodeBase\ApiResources\AbstractApiResource;

/**
 * Interface ApiResourceInterface
 *
 * @package ItlabStudio\ApiClient\CodeBase\Interfaces
 */
interface ApiResourceInterface
{
    /**
     * @param $key
     * @param $value
     * @return self
     */
    function setFilter($key, $value);

    /**
     * @param array $filters
     * @return self
     */
    function setFilters(array $filters = []);
}
