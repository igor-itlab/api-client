<?php


namespace ItlabStudio\ApiClient\CodeBase\Response;

/**
 * Class XmlResponse
 * @package ItlabStudio\ApiClient\CodeBase\Response
 */
class XmlResponse extends ApiResponse
{
    /**
     * @param \SoapClient $response
     * @return XmlResponse|static
     */
    public static function createFromResponse($response)
    {
        $plainXML = self::mungXML($response->__getLastResponse());
        $arrayResult = json_decode(json_encode(SimpleXML_Load_String($plainXML, 'SimpleXMLElement', LIBXML_NOCDATA)), true);

        if ($arrayResult) {
            preg_match("/HTTP\/\d\.\d\s*\K[\d]+/", $response->__getLastResponseHeaders(), $matches);

            return (new static(
                '',
                $arrayResult,
                $response->__getLastResponse(),
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
    }

    /**
     * FUNCTION TO MUNG THE XML SO WE DO NOT HAVE TO DEAL WITH NAMESPACE
     * @param $xml
     * @return string|string[]|null
     */
    public static function mungXML($xml)
    {
        $obj = SimpleXML_Load_String($xml);
        if ($obj === FALSE) return $xml;

        // GET NAMESPACES, IF ANY
        $nss = $obj->getNamespaces(TRUE);
        if (empty($nss)) return $xml;

        // CHANGE ns: INTO ns_
        $nsm = array_keys($nss);
        foreach ($nsm as $key)
        {
            // A REGULAR EXPRESSION TO MUNG THE XML
            $rgx
                = '#'               // REGEX DELIMITER
                . '('               // GROUP PATTERN 1
                . '\<'              // LOCATE A LEFT WICKET
                . '/?'              // MAYBE FOLLOWED BY A SLASH
                . preg_quote($key)  // THE NAMESPACE
                . ')'               // END GROUP PATTERN
                . '('               // GROUP PATTERN 2
                . ':{1}'            // A COLON (EXACTLY ONE)
                . ')'               // END GROUP PATTERN
                . '#'               // REGEX DELIMITER
            ;
            // INSERT THE UNDERSCORE INTO THE TAG NAME
            $rep
                = '$1'          // BACKREFERENCE TO GROUP 1
                . '_'           // LITERAL UNDERSCORE IN PLACE OF GROUP 2
            ;
            // PERFORM THE REPLACEMENT
            $xml =  preg_replace($rgx, $rep, $xml);
        }
        return $xml;
    }
}
