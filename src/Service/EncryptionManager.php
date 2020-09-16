<?php


namespace ItlabStudio\ApiClient\Service;

use Firebase\JWT\JWT;

/**
 * Class EncryptionManager
 * @package ItlabStudio\ApiClient\Service
 */
class EncryptionManager
{
    /**
     * @param string $data
     * @param string $key
     * @return string
     */
    public static function encodeSignature(string $data, string $key): string
    {
        return base64_encode(hash_hmac('sha256', $data, $key, true));
    }

    /**
     * @param string $projectId
     * @param int $iat
     * @param int $exp
     * @param string $key
     * @return string
     */
    public static function encodeJWS(string $projectId, int $iat, int $exp, string $key): string
    {
        return JWT::encode(
            [
                'projectId' => $projectId,
                'iat'       => $iat,
                'exp'       => $exp
            ],
            $key
        );
    }
}
