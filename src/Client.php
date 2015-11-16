<?php
namespace F1Data;
class Client {
    private $httpClient;

    public function __construct (HttpAdapter\HttpAdapterInterface $httpAdapter) {
        $this->httpClient = $httpAdapter;
    }

    public function getRace($season = 2010,$roundNo = 1, $includePitData = true) {
        $responseXML = $this->httpClient->get($season . '/' . $roundNo . '/laps?limit=2000');
        $race = $this->formatRace($responseXML->RaceTable->Race[0]);
        if($includePitData) {
            $pitXML = $this->httpClient->get($season . '/' . $roundNo . '/pitstops?limit=2000');
            $race->loadPitStopsFromXML($pitXML->RaceTable->Race->PitStopsList);
        }
        return $race;
    }

    private function formatRace(\SimpleXMLElement $raceXML) {
        $race = new Race($raceXML);
        return $race;
    }


}