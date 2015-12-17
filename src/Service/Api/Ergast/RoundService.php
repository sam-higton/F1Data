<?php
namespace F1Data\Service\Api\Ergast;
use F1Data\Service\RoundServiceInterface;
use F1Data\Service\ServiceInterface;
use F1Data\Service\ResponseObject;
class RoundService extends Ergast implements ServiceInterface, RoundServiceInterface {
    /**
     * @param $year
     * @param $round
     * @return mixed
     */
    public function getRound($year, $round) {
        //test
        $query = new ErgastQuery();
        $query->setDataType(ApiTypes::$ROUND);
        $query->specifyYear($year);
        $query->specifyRound($round);
        $results = $this->makeRequest($query);
        return $this->formatRound($results->RaceTable->Race);

    }

    /**
     * @param $year
     * @return mixed
     */
    public function getSeason($year) {
        // TODO: Implement getSeason() method.
    }

    private function formatRound (\SimpleXMLElement $xml) {
        $data = [];
        $data['year'] = (string) $xml['season'];
        $data['roundNo'] = (string) $xml['round'];
        $data['date'] = (string) $xml->Date;
        $data['time'] = (string) $xml->Time;
        $data['name'] = (string) $xml->RaceName;

        $circuitData = [];
        $circuitData['id'] = (string) $xml->Circuit['circuitId'];
        $circuitData['name'] = (string) $xml->Circuit->CircuitName;
        $circuitData['country'] = (string) $xml->Circuit->Location->Country;
        $circuitData['locality'] = (string) $xml->Circuit->Location->Locality;
        $circuitData['lat'] = (string) $xml->Circuit->Location['lat'];
        $circuitData['long'] = (string) $xml->Circuit->Location['long'];

        $circuit = new ResponseObject("Circuit",$circuitData);

        $data['circuit'] = $circuit;

        return new ResponseObject("Round", $data);

    }


}