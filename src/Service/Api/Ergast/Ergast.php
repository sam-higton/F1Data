<?php
namespace F1Data\Service\Api\Ergast;
use F1Data\Adapter\AdapterInterface;
use F1Data\Adapter\Http\GuzzleAdapter;
use F1Data\Adapter\Http\HttpAdapterInterface;
use F1Data\Service\ServiceInterface;
use F1Data\Service\ResponseObject;

class Ergast  {

    /** @var  \F1Data\Adapter\Http\HttpAdapterInterface $httpAdapter */
    private $httpAdapter;

    public function __construct($adapter = false) {
        if($adapter instanceof HttpAdapterInterface) {
            $this->httpAdapter = $adapter;
        } else {
            $this->httpAdapter = new GuzzleAdapter();
        }
    }

    public function setAdapter(HttpAdapterInterface $adapter) {
            $this->httpAdapter = $adapter;
    }

    protected function makeRequest (ErgastQuery $query) {
        $result = $this->httpAdapter->get($query->buildRequestURI());
        return $result;
    }


}