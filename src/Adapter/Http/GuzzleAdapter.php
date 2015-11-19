<?php
namespace F1Data\Adapter\Http;
use F1Data\Adapter\AdapterInterface;
use \Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Client;
class GuzzleAdapter implements HttpAdapterInterface {

    private $basePath;
    private $client;
    private $cacheKey = "F1Data_";

    public function __construct($basePath = "http://ergast.com/api/f1/"){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->client = new Client([
           "base_uri" => $basePath
        ]);
    }

    public function setBasePath($basePath) {

    }

    public function get ($path) {
        if($this->checkCache($path)) {
            $body = $this->loadFromCache($path);
        } else {
            $response = $this->client->get($path);
            $body = $this->getBodyContents($response);
            $this->saveToCache($path, $body);
        }

        $responseXML = $this->toXMLObject($body);
        return $responseXML;
    }

    private function saveToCache ($key,$value) {
        //todo: replace caching with something proper, like redis
        $_SESSION[$this->cacheKey . $key] = $value;
    }

    private function loadFromCache ($key) {
        return $_SESSION[$this->cacheKey . $key];
    }

    private function checkCache ($key) {
        return (isset($_SESSION[$this->cacheKey . $key]));
    }

    private function getBodyContents (ResponseInterface $response) {
        return $response->getBody()->getContents();
    }

    private function toXMLObject ($xmlString) {
        return simplexml_load_string($xmlString);
    }

}