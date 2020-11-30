<?php


namespace ItlabStudio\ApiClient\CodeBase\Response;

use ItlabStudio\ApiClient\CodeBase\DenormalizerFactory\ResponseCollection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\ResponseInterface;


/**
 * Class ApiResponse
 *
 * @package ItlabStudio\ApiClient\CodeBase\Response
 */
class ApiResponse extends Response implements \Iterator, \Countable, \Serializable
{

    /**
     * @var array
     */
    protected $errors;

    /**
     * @var string
     */
    protected $message;
    /**
     * @var array
     */
    protected $data = null;
    /**
     * @var array
     */
    protected $info = [];

    /**
     * ApiResponse constructor.
     *
     * @param string $message
     * @param mixed  $data
     * @param array  $errors
     * @param int    $status
     * @param array  $headers
     * @param bool   $json
     */
    public function __construct(string $message = '', $data = null, $content = null, array $info = [], array $errors = [], int $status = 200, array $headers = [], bool $json = false)
    {
        $this->errors  = $errors;
        $this->message = $message;
        $this->data    = $data;
        $this->info    = $info;

        parent::__construct($content, $status, $headers, $json);
    }

    /**
     * @param ResponseInterface $response
     * @return static
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public static function createFromResponse(ResponseInterface $response)
    {
        return (new static('', $response->toArray(), $response->getContent(), $response->getInfo(), [], $response->getStatusCode(), $response->getHeaders()));
    }

    /**
     * @return array|int|mixed|null
     */
    public function count()
    {
        return is_object($this->data) ? $this->data->count() : count($this->data);;
    }

    /**
     * @return array|mixed|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setData($data = [])
    {
        $this->data = new ResponseCollection($data);

        return $this;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return is_object($this->data) ? $this->data->current() : current($this->data);
    }

    /**
     * @return mixed|void
     */
    public function next()
    {
        return is_object($this->data) ? $this->data->next() : next($this->data);
    }

    /**
     * @return bool|float|int|string|null
     */
    public function key()
    {
        return is_object($this->data) ? $this->data->key() : key($this->data);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return is_object($this->data) ? $this->data->key() !== null : key($this->data) !== null;
    }

    /**
     * @return mixed|void
     */
    public function rewind()
    {
        return is_object($this->data) ? $this->data->first() : reset($this->data);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function serialize()
    {
        return serialize([
            'content'    => $this->data,
            'errors'     => $this->errors,
            'message'    => $this->message,
            'statusCode' => $this->getStatusCode(),
        ]);
    }

    /**
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        $objectData       = unserialize($serialized);
        $this->data       = $objectData['content'];
        $this->errors     = $objectData['errors'];
        $this->message    = $objectData['message'];
        $this->statusCode = $objectData['statusCode'];
    }
}
