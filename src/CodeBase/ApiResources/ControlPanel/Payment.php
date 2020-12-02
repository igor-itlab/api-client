<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;


use ItlabStudio\ApiClient\CodeBase\Builders\HttpRequestBuilder;
use ItlabStudio\ApiClient\Service\EncryptionManager;

/**
 * Class Payment
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Payment extends ApiResource
{
    /**
     * @param  $id
     *
     * @return mixed|void
     */
    public function getById($id)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/payments/' . $id)
        );
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/payments')
        );
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function retryCallback($id)
    {
        return $this->makeRequest(
            $this->request()->withUrl('/api/private/payments/retry-callback/' . $id)
        );
    }

    /**
     *  [
     *  'paymentSystem' => $paymentSystem,
     *  'currency'      => $currency,
     *  'connection'    => $connection,
     *  'locale'        => $locale ?
     * ]
     *
     * @param array $body
     *
     * @return mixed
     */
    public function attributePrerequest(array $body = [])
    {
        return $this->makeRequest(
            $this->request()
                 ->withMethod(HttpRequestBuilder::$METHOD_POST)
                 ->withUrl('/api/private/payments/attribute-prerequest')
                 ->withOptions(['json' => $body])
        );
    }

    /**
     * [
     *  'paymentSystem' => $paymentSystem,
     *  'amount'        => $amount,
     *  'currency'      => $currency,
     *  'referenceId'   => $referenceId,
     *  'connection'    => $connection,
     *  'returnUrl'     => $returnUrl, ?
     *  'attributes'    => $attributes,
     *  'callBackUrl'   => $callBackUrl, ?
     * ]
     *
     * @param array $body
     *
     * @return mixed
     */
    public function setInvoice(array $body = [])
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/payments')
                 ->withMethod(HttpRequestBuilder::$METHOD_POST)
                 ->withOptions(['json' => $this->withSignature($body)])

        );
    }

    /**
     * @param $body
     *
     * @return array
     */
    protected function withSignature($body)
    {
        return EncryptionManager::withSignature(
            $body,
            $this->client->getResourceInjector()->Auth(static::$TYPE_PRIVATE)->getSecretKey()
        );
    }
}
