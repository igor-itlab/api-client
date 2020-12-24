<?php


namespace ItlabStudio\ApiClient\Service;

use Firebase\JWT\JWT;
use Jose\Component\Core\AlgorithmManager;
use Jose\Component\KeyManagement\JWKFactory;
use Jose\Component\Signature\Algorithm\HS256;
use Jose\Component\Signature\JWSBuilder;
use Jose\Component\Signature\Serializer\CompactSerializer;
use JsonException;

/**
 * Class EncryptionManager
 *
 * @package ItlabStudio\ApiClient\Service
 */
class EncryptionManager
{
    /**
     * @param $body
     *
     * @return array
     */
    public static function withSignature($body, $projectKey)
    {
        return array_merge(
            $body,
            [
                'signature' => self::encodeSignature(
                    json_encode($body, JSON_UNESCAPED_SLASHES),
                    $projectKey
                ),
            ]
        );
    }

    /**
     * @param string $data
     * @param string $key
     *
     * @return string
     */
    public static function encodeSignature(string $data, string $key): string
    {
        return base64_encode(hash_hmac('sha256', $data, $key, true));
    }

    /**
     * @param        $data
     * @param string $signature
     * @param string $key
     *
     * @return bool
     */
    public static function checkSignature($data, string $signature, string $key)
    {
        try {
            return
                self::encodeSignature(
                    json_encode($data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES),
                    $key
                ) === $signature;
        } catch (JsonException $e) {
            return false;
        }
    }

    /**
     * @param string $projectId
     * @param int    $iat
     * @param int    $exp
     * @param string $key
     *
     * @return string
     */
    public static function encodeJWS(string $projectId, int $iat, int $exp, string $key): string
    {
        return JWT::encode(
            [
                'projectId' => $projectId,
                'iat'       => $iat,
                'exp'       => $exp,
            ],
            $key
        );
    }

    /**
     * @param string $controlPanelID
     * @param string $controlPanelSecret
     *
     * @return string
     * @throws JsonException
     */
    public static function encodeSecretKey(string $controlPanelID, string $controlPanelSecret): string
    {
        $algorithmManager = new AlgorithmManager([new HS256()]);

        $jwk = JWKFactory::createFromSecret(
            $controlPanelSecret, // The shared secret
            [
                'alg' => 'HS256',
                'use' => 'sig',
            ]
        );

        $jwsBuilder = new JWSBuilder($algorithmManager);

        $payload = json_encode(
            [
                "projectId" => $controlPanelID,
                'iat'       => time(),
                'exp'       => time() + 3600,
            ],
            JSON_THROW_ON_ERROR
        );

        $jws        = $jwsBuilder
            ->create()                               // We want to create a new JWS
            ->withPayload($payload)                  // We set the payload
            ->addSignature($jwk, ['alg' => 'HS256']) // We add a signature with a simple protected header
            ->build();
        $serializer = new CompactSerializer(); // The serializer

        return $serializer->serialize($jws, 0);
    }
}
