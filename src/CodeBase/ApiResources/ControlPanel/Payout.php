<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

use ItlabStudio\ApiClient\CodeBase\Builders\HttpRequestBuilder;
use ItlabStudio\ApiClient\Service\EncryptionManager;

/**
 * Class Payout
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Payout extends ApiResource
{
    /**
     * @param $id
     *
     * @return mixed|void
     */
    public function getById($id)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/payouts/' . $id)
        );
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/payouts')
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
            $this->request()->withUrl('/api/private/payouts/retry-callback/' . $id)
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
                 ->withUrl('/api/private/payouts/attribute-prerequest')
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
     *  'attributes'    => $attributes, //[['attributeName'=>'attributeValue']]
     *  'callBackUrl'   => $callBackUrl, ?
     * ]
     *
     * @param array $body
     *
     * @TODO fix json option
     * @return mixed
     */
    public function setInvoice(array $body = [])
    {
        $this->withNamedAttributes($body);

        return $this->makeRequest(
            $this->request()->withUrl('api/private/payouts')
                 ->withMethod(HttpRequestBuilder::$METHOD_POST)
                 ->withOptions(['json' => $this->withSignature($body)])
        );
    }

    /**
     * convert attributes
     * from
     *      [['attributeName'=>'attributeValue']]
     * to
     *      [['name'=>'attributeName', 'value'=>'attributeValue']]
     *
     * @param $body
     *
     * @return mixed
     */
    protected function withNamedAttributes(&$body)
    {
        if (isset($body['attributes'])) {
            foreach ($body['attributes'] as $key => $item) {
                $substitute[] = ['name' => $key, 'value' => $item];
            }
            $body['attributes'] = $substitute;
        }
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
