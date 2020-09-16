<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

/**
 * Class Payout
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class Payout extends ApiResource
{
    public function getById(int $id)
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'payouts/' . $id;

        return $this->request();
    }

    public function getAll()
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'payouts';

        return $this->request();
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
     * @param array $body
     * @return mixed
     */
    public function setInvoice(array $body = [])
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->method = static::$METHOD_POST;
        $this->uri = 'payouts';

        return $this->request(
            ['json' => $this->withSignature($body)]
        );
    }

    /**
     * @param $body
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
                    $key
                )
            ]
        );
    }
}
