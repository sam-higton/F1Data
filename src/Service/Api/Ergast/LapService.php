<?php
namespace F1Data\Service\Api\Ergast;
use F1Data\Entity\Lap;
use F1Data\Service\LapServiceInterface;
use F1Data\Service\ResponseCollection;
use F1Data\Service\ResponseObject;

class LapService extends Ergast implements LapServiceInterface {
    /**
     * @param $year
     * @param $round
     * @return mixed
     */
    public function getRoundLaps($year, $round) {

        $query = new ErgastQuery();
        $query->setDataType(ApiTypes::$LAP);
        $query->specifyYear($year);
        $query->specifyRound($round);
        $response = $this->makeRequest($query);
        return $this->formatLapsCollection($response->RaceTable->Race);


    }

    /**
     * @param $year
     * @param $round
     * @param $lap
     * @return mixed
     */
    public function getRoundLap($year, $round, $lap) {
        // TODO: Implement getRoundLap() method.
    }

    /**
     * @param $year
     * @param $round
     * @param $driver
     * @return mixed
     */
    public function getDriverLaps($year, $round, $driver) {
        // TODO: Implement getDriverLaps() method.
    }

    /**
     * @param $year
     * @param $round
     * @param $lap
     * @param $driver
     * @return mixed
     */
    public function getDriverLap($year, $round, $lap, $driver) {
        // TODO: Implement getDriverLap() method.
    }

    private function formatLapsCollection (\SimpleXMLElement $xml) {
        $lapCollection = new ResponseCollection("LapCollection");
        /** @var \SimpleXMLElement $lap */
        foreach($xml->LapsList->Lap as $lap) {
            $lapCollection->addObject($this->formatLapObject($lap));
        }
        return $lapCollection;
    }

    private function formatLapObject (\SimpleXMLElement $xml) {
        $lapFields = [];
        $lapFields['number'] = $xml['number'];
        $lapFields['timings'] = $this->formatTimingCollection($xml->Timing);
        return new ResponseObject("Lap",$lapFields);

    }

    private function formatTimingCollection (\SimpleXMLElement $xml) {
        $timingCollection = new ResponseCollection("TimingCollection");
        foreach($xml as $timing) {
            $timingCollection->addObject($this->formatTimingObject($timing));
        }
        return $timingCollection;
    }

    private function formatTimingObject (\SimpleXMLElement $xml) {
        $data = [];
        $data['driver'] = (string) $xml['driverId'];
        $data['lap'] = (string) $xml['lap'];
        $data['position'] = (string) $xml['position'];
        $data['time'] = (string) $xml['time'];
        return new ResponseObject("Timing",$data);
    }


}