<?php
namespace F1Data;
class Client {
    private $httpClient;

    public function __construct (HttpAdapter\HttpAdapterInterface $httpAdapter) {
        $this->httpClient = $httpAdapter;
    }

    public function getRace($season = 2010,$roundNo = 1) {
        $responseXML = $this->httpClient->get($season . '/' . $roundNo . '/laps?limit=2000');
        $race = $this->formatRace($responseXML->RaceTable->Race[0]);
        return $race;
    }

    private function formatRace(\SimpleXMLElement $raceXML) {
        $race = new Race($raceXML);
        return $race;
    }


}