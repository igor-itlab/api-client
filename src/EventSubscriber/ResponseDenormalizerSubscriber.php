<?php


namespace ItlabStudio\ApiClient\EventSubscriber;

use ItlabStudio\ApiClient\CodeBase\Interfaces\CallbackHandlerInterface;
use ItlabStudio\ApiClient\Events\AfterRequestEvent;
use ItlabStudio\ApiClient\Events\ApiClientEvents;
use ItlabStudio\ApiClient\Events\BeforeRequestEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class HashPasswordListener
 *
 * @package App\EventListener
 */
class ResponseDenormalizerSubscriber implements EventSubscriberInterface
{
    /**
     * CallbackHandler constructor.
     *
     * @param CallbackHandlerInterface $callbackHandler
     */
    public function __construct(CallbackHandlerInterface $callbackHandler)
    {
        $this->callbackHandler = $callbackHandler;
    }

    /**
     * @return array|string[]
     */
    public static function getSubscribedEvents(): array
    {
        return [
            ApiClientEvents::BEFORE_REQUEST => ['beforeRequestEvent', 50],
            ApiClientEvents::AFTER_REQUEST  => ['afterRequestEvent', 50],
        ];
    }

    /**
     * @param BeforeRequestEvent $args
     */
    public function beforeRequestEvent(BeforeRequestEvent $args)
    {
    }

    /**
     * @param AfterRequestEvent $args
     */
    public function afterRequestEvent(AfterRequestEvent $args)
    {
        $args->setResponse(
            $this->callbackHandler
                ->setCustom(
                    $args->getRequestBuilder()->getCallbacks()
                )
                ->fire($args->getApiResource(), $args->getResponse())
        );
    }
}
