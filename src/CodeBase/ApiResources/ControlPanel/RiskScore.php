<?php


namespace ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel;

/**
 * Class RiskScore
 *
 * @package ItlabStudio\ApiClient\CodeBase\ApiResources\ControlPanel
 */
class RiskScore extends ApiResource
{
    /**
     * @param int $id
     *
     * @return mixed
     */
    public function checkById(int $id)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/risk_scores/' . $id)
        );
    }

    /**
     * [
     *   'asset'      => $asset,
     *   'address'    => $address,
     *   'txhash'     => $txhash,
     *   'attributes' => $attributes,
     *   'connection' => $connection
     * ]
     *
     * @param array $body
     *
     * @return mixed
     */
    public function check(array $body = [])
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/risk_scores')
                 ->withOptions(['json' => $body])
        );
    }
}
