<?php

namespace core\Http;

class Response
{
    public function __construct()
    {
    }

    private $status = 200;

    public function status(int $code)
    {
        $this->status = $code;
        return $this;
    }

    public function toJSON($data = [])
    {
        http_response_code($this->status);
        echo json_encode($data); exit;
    }

    public function toXML($data = [])
    {
        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($data, array ($xml, 'addChild'));
        http_response_code($this->status);
        return $xml->asXML();
    }
}
