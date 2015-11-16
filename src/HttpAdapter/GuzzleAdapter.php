<?php
namespace F1Data\HttpAdapter;
use \Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Client;
class GuzzleAdapter implements HttpAdapterInterface {

    private $basePath;
    private $client;

    public function __construct($basePath = "http://ergast.com/api/f1/"){
        $this->client = new Client([
           "base_uri" => $basePath
        ]);
    }

    public function setBasePath($basePath) {

    }

    public function get ($path) {
        $response = $this->client->get($path);
        $responseXML = $this->toXMLObject($response);
        return $responseXML;
    }

    private function toXMLObject (ResponseInterface $response) {
        return simplexml_load_string($response->getBody()->getContents());
    }

}