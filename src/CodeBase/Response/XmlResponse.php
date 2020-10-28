<?php


namespace ItlabStudio\ApiClient\CodeBase\Response;

use ItlabStudio\ApiClient\CodeBase\Response\XmlResourceCaster\XmlResourceCaster;
use SimpleXMLElement;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class XmlResponse
 * @package ItlabStudio\ApiClient\CodeBase\Response
 */
class XmlResponse extends ApiResponse
{

    /**
     * @param ResponseInterface $response
     * @return XmlResponse|static
     */
    public static function createFromResponse($response)
    {
        $xml = new SimpleXMLElement($response->__getLastResponse());

        if (xml_get_error_code($response->__getLastResponse()) || !$xml) {
            $parsedResp = XmlResourceCaster::castXml($response);

            return (new static(
                '',
                self::xml_to_array($xml),
                $xml,
                [
                    'lastRequest'         => $response->__getLastRequest(),
                    'lastRequestHeaders'  => $response->__getLastRequestHeaders(),
                    'lastResponse'        => $response->__getLastResponse(),
                    'lastResponseHeaders' => $response->__getLastResponseHeaders(),
                    'parsedErrors'        => $parsedResp
                ],
                $parsedResp,
                xml_get_error_code($response->__getLastResponse()),
                explode('\n\r', $response->__getLastResponseHeaders())
            ));
        }

        preg_match("/HTTP\/\d\.\d\s*\K[\d]+/", $response->__getLastResponseHeaders(), $matches);

        return (new static(
            '',
            self::xml_to_array($xml),
            $xml,
            [
                'lastRequest'         => $response->__getLastRequest(),
                'lastRequestHeaders'  => $response->__getLastRequestHeaders(),
                'lastResponse'        => $response->__getLastResponse(),
                'lastResponseHeaders' => $response->__getLastResponseHeaders()
            ],
            [],
            $matches[0],
            explode('\n\r', $response->__getLastResponseHeaders())
        ));
    }

    protected static function xml_to_array($root)
    {
        $result = array();

        if ($root->hasAttributes()) {
            $attrs = $root->attributes;
            foreach ($attrs as $attr) {
                $result['@attributes'][$attr->name] = $attr->value;
            }
        }

        if ($root->hasChildNodes()) {
            $children = $root->childNodes;
            if ($children->length == 1) {
                $child = $children->item(0);
                if ($child->nodeType == XML_TEXT_NODE) {
                    $result['_value'] = $child->nodeValue;

                    return count($result) == 1
                        ? $result['_value']
                        : $result;
                }
            }
            $groups = array();
            foreach ($children as $child) {
                if (!isset($result[$child->nodeName])) {
                    $result[$child->nodeName] = xml_to_array($child);
                } else {
                    if (!isset($groups[$child->nodeName])) {
                        $result[$child->nodeName] = array($result[$child->nodeName]);
                        $groups[$child->nodeName] = 1;
                    }
                    $result[$child->nodeName][] = xml_to_array($child);
                }
            }
        }

        return $result;
    }
}
