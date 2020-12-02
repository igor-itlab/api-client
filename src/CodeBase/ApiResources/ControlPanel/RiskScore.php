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
     * @param string $id
     *
     * @return mixed
     */
    public function checkById($id)
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/risk_scores/' . $id)
        );
    }

    /**
     * @return mixed|void
     */
    public function checkAll()
    {
        return $this->makeRequest(
            $this->request()->withUrl('api/private/risk_scores')
        );
    }

    /**
     * [
     *   'asset'      => $asset,
     *   'address'    => $address,
     *   'txhash'     => $txhash,
     *   'attributes' => $attributes, [["name": "string", "value": "string"]]
     *   "callBackUrl"=> "string", ?
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
            $this->request()
                 ->withUrl('api/private/risk_scores')
                 ->withOptions(['json' => $body])
        );
    }
}
