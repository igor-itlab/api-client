<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

use ItlabStudio\ApiClient\CodeBase\Builders\HttpRequestBuilder;

/**
 * Class Payout
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Payout extends ApiResource
{
    /**
     * @param int $id
     *
     * @return mixed|void
     */
    public function getById(int $id)
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
     * [
     *  'paymentSystem' => $paymentSystem,
     *  'amount'        => $amount,
     *  'currency'      => $currency,
     *  'referenceId'   => $referenceId,
     *  'connection'    => $connection,
     *  'returnUrl'     => $returnUrl, ?
     *  'attributes'    => $attributes,
     *  'callUrl'       => $callUrl
     * ]
     *
     * @param array $body
     *
     * @TODO fix json option
     * @return mixed
     */
    public function setInvoice(array $body = [])
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/payouts')
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
        return array_merge(
            $body,
            [
                'signature' => $this->getSignature(
                    $body['paymentSystem'] . ':' . $body['amount']
                    . ':' . $body['currency'] . ':' . $body['referenceId']
                    . ':' . $body['connection'] . ':' .
                    base64_encode(
                        json_encode($body['attributes'])
                    ),
                    $this->client->getResourceInjector()->Auth(static::$TYPE_PRIVATE)->getSecretKey()
                ),
            ]
        );
    }
}
