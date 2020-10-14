<?php


namespace ItlabStudio\ApiClient\Events;


/**
 * Class ApiClientEvents
 *
 * @package ItlabStudio\ApiClient\CodeBase\Event
 */
class ApiClientEvents
{
    /**
     * @Event("ItlabStudio\ApiClient\Events\BeforeRequestEvent")
     */
    public const BEFORE_REQUEST = 'api_client.before_request';

    /**
     * @Event("ItlabStudio\ApiClient\Events\AfterRequestEvent")
     */
    public const AFTER_REQUEST = 'api_client.after_request';

    /**
     * @Event("ItlabStudio\ApiClient\Events\AfterMappingEvent")
     */
    public const AFTER_MAPPING = 'api_client.after_mapping';

    /**
     * @Event("ItlabStudio\ApiClient\Events\AfterCallbacksEvent")
     */
    public const AFTER_CALLBACKS = 'api_client.after_callbacks';

    /**
     * @Event("ItlabStudio\ApiClient\Events\RequestFailedEvent")
     */
    public const REQUEST_FAILED = 'api_client.request_failed';

    /**
     * @Event("ItlabStudio\ApiClient\Events\RequestSuccessfulEvent")
     */
    public const REQUEST_SUCCESSFUL = 'api_client.request_successful';

}