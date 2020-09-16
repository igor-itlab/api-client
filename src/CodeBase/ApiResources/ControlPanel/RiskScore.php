<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

/**
 * Class RiskScore
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class RiskScore extends ApiResource
{
    /**
     * @param int $id
     * @return mixed
     */
    public function checkById(int $id)
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'risk_scores/' . $id;

        return $this->request();
    }

    /**
     * [
     *   'asset'      => $asset,
     *   'address'    => $address,
     *   'txhash'     => $txhash,
     *   'attributes' => $attributes,
     *   'connection' => $connection
     * ]
     * @param array $body
     * @return mixed
     */
    public function check(array $body = [])
    {
        $this->auth(static::$TYPE_PRIVATE);
        $this->uri = 'risk_scores';

        return $this->request(['json' => $body]);
    }
}
