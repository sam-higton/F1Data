<?php
namespace F1Data;
class Client {
    private $httpClient;

    public function __construct () {
        $this->httpClient = new \GuzzleHttp\Client([
            "base_uri" => "http://ergast.com/api/f1/"
        ]);
    }

    public function getRace($season = 2010,$roundNo = 1) {
        $response = $this->httpClient->get($season . '/' . $roundNo . '/laps?limit=2000');
        $responseXML = $this->toXMLObject($response);
        $race = $this->formatRace($responseXML->RaceTable->Race[0]);
        return $race;
    }

    private function formatRace(SimpleXMLElement $raceXML) {
        $race = new Race($raceXML);
        return $race;
    }

    private function toXMLObject (Psr\Http\Message\ResponseInterface $response) {
        return simplexml_load_string($response->getBody()->getContents());
    }

}